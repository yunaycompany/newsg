<?php

/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\RecordsClassifiersBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Monolog\Handler\NewRelicHandlerTest;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\View\View;
use SIGE\SigeBundle\HandlerRest\HttpCode;
use \FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializationContext;
use FOS\RestBundle\Controller\Annotations;
use Symfony\Component\Form\FormTypeInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use SIGE\RecordsClassifiersBundle\Form\ClasificacionType;

class ClasificacionController extends FOSRestController {

    private $entityClass = 'SIGE\RecordsClassifiersBundle\Entity\Clasificacion';
    private $formType = 'SIGE\RecordsClassifiersBundle\Form\ClasificacionType';

    /**
     * Listar Clasificacion
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar Clasificacion",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/clasificacion/clasificadorl;k")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="15", description="Cantidad de resultados que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     *
     * @return View
     */
    public function getClasificacionsAction(Request $request, ParamFetcherInterface $paramFetcher) {
        try {

            $query = $request->query->get("query");
            $idor = $request->request->get("request");
            $filtres = array();
            $search_type = 0; //1 es simple y 2 avanzada
            if ($query) {
                $filtres = (array) json_decode($query);
                if (isset($filtres['simple_search'])) {
                    $search_type = 1;
                    $filtres['simple_search'] = '';
                } else {
                    $search_type = 2;
                }
                $filtres = array_filter($filtres);
            }
            $dataByRange = $this->container->get('sige.class.handler')->allRange($paramFetcher, $this->entityClass, $this->formType, $filtres, $search_type);
            $data = $dataByRange->getData();
            $allData = $this->container->get('sige.class.handler')->all($this->entityClass, $this->formType);
            $length = count($allData->getData());
            $jsonData = $this->container->get('jms_serializer')->serialize($data, "json");
            return new Response("{'success': true, 'data':" . $jsonData . ",'length':" . $length . "}", HttpCode::HTTP_OK);
        } catch (\Exception $ex) {
            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Clasifiers list failed'))), HttpCode::HTTP_SERVER_ERROR);
        }
    }

    /**
     * Listar clasificaciones asociadas a un clasificador
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar clasificaciones asociadas a un clasificador",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/clasificacion/clasificador")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="15", description="Cantidad de resultados que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     * @param int $id El id del Clasificador
     *
     * @return View
     */
    public function getClasificationsByClasificatorAction(Request $request, ParamFetcherInterface $paramFetcher) {
        try {
            $query = $request->query->get("query");
            $flag = 0;
            $filtros = array();
            $search_type = 0; //1 es simple y 2 avanzada
            if ($query) {
                $filtros = (array) json_decode($query);
                if (isset($filtros['simple_search'])) {
                    $search_type = 1;
                    $filtros['simple_search'] = '';
                } else {
                    $search_type = 2;
                }
                $filtros = array_filter($filtros);
                $flag = 1;
            } else {
                return new Response(json_encode(array("success" => true, "data" => null, "length" => 0)), HttpCode::HTTP_OK);
            }

            if ($flag == 1) {
                $id = $filtros['idclasificador'];
                $em = $this->getDoctrine()->getManager();
                $clasificador = $em->getRepository("RecordsClassifiersBundle:Clasificador")->find($id);
                $length = count($clasificador->getClasificaciones());
                if ($search_type == 1) {
                    $offset = $paramFetcher != null ? $paramFetcher->get('start') : null;
                    $offset = null == $offset ? 0 : $offset;
                    $limit = $paramFetcher != null && $paramFetcher->get('limit') ? $paramFetcher->get('limit') : 5;
                    $cion = $em->getRepository("RecordsClassifiersBundle:Clasificacion")->findBy(array('id' => $filtros['id']));
                    foreach ($clasificador->getClasificaciones() as $clasificacion) {
                        if ($clasificacion->getId() == $cion[0]->getId()) {
                            $data = $cion;
                        }
                    }
                } else {
                    $data = $clasificador->getClasificaciones();
                }
            }
            $data = $this->container->get('jms_serializer')->serialize($data, "json");
            return new Response(json_encode(array("success" => true, "data" => json_decode($data), "length" => $length)), HttpCode::HTTP_OK);
        } catch (Exception $e) {
            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Get clasifications by clasifier failed'))), HttpCode::HTTP_SERVER_ERROR);
        }
    }

    /**
     * Obtener Clasificacion dado su id
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener Clasificacion dado su id",
     *   output = "Clasificacion",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/clasificacion/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id del Clasificacion
     *
     * @return array
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Clasificacion
     */
    public function getClasificacionAction($id) {
        return $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
    }

    /**
     * Adicionar Clasificacion.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Adicionar Clasificacion",
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Clasificacion",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/clasificacion/clasificador")
     * @param Request $request El objeto Request de la petición
     * @return FormTypeInterface|View
     */
    public function postClasificacionAction(Request $request) {
        try {
            $parameters = $request->request->all();
            $query = $request->query->get("query");
            $filtros = array();
            if ($query) {
                $filtros = (array) json_decode($query);
                $filtros = array_filter($filtros);
            }
            $parameters['clasificador'] = $filtros['id'];

            //Validar que no exista la clasificacion
            $em = $this->getDoctrine()->getManager();
            $clasif = $em->getRepository('RecordsClassifiersBundle:Clasificacion')->findOneBy(array('id' => $parameters['id']));
            if ($clasif) {
                return new Response('{"success":false, errors:{"message": ' . $this->get('translator')->trans('Clasification post ya existe') . '}}', HttpCode::HTTP_SERVER_ERROR);
            }

            $respuesta = $this->container->get('sige.class.handler')->post($parameters, $this->entityClass, $this->formType);
            if ($respuesta["success"]) {
                $respuesta["message"] = $this->get('translator')->trans('Clasification add');
            }
            return new Response(json_encode($respuesta), HttpCode::HTTP_OK);
        } catch (Exception $e) {
            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Clasification post error'))), HttpCode::HTTP_SERVER_ERROR);
        }
    }

    /**
     * Si no existe el id de Clasificacion Adiciona, si existe Modifica
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Clasificacion",
     *   statusCodes = {
     *  201 = "Es retornado cuando Clasificacion es creado",
     *  204 = "Es retornado si no existen errores",
     *  400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Put("/clasificacion/clasificador/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de Clasificacion
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Clasificacion
     */
    public function putClasificacionAction(Request $request, $id) {
        try {
            $em = $this->getDoctrine()->getManager();

            $parameters = $request->request->all();
            $query = $request->query->get("query");
            $filtros = array();
            if ($query) {
                $filtros = (array) json_decode($query);
                $filtros = array_filter($filtros);
            }

            $parameters['clasificador'] = $filtros['id'];
            $is_clasification = $em->getRepository('RecordsClassifiersBundle:Clasificacion')->findOneBy(array('id' => $id));
            $view = View::create();
            $view->setData($is_clasification);
            $view->setFormat("json");

            $respuesta = $this->container->get('sige.class.handler')->put($view->getData(), $parameters, $this->entityClass, $this->formType);
            if ($respuesta["success"]) {
                $respuesta["message"] = $this->get('translator')->trans('Clasification modify');
            }
            return new Response(json_encode($respuesta), HttpCode::HTTP_OK);
        } catch (Exception $e) {
            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Clasification put error'))), HttpCode::HTTP_SERVER_ERROR);
        }
    }

    /**
     * Actualiza o Crea Clasificacion en un lugar específico
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Clasificacion",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Patch("/clasificacion/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de Clasificacion
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Clasificacion
     */
    public function patchClasificacionAction(Request $request, $id) {
        return $this->container->get('sige.class.handler')->patch($this->get($id), $request->request->all(), $this->entityClass, $this->formType);
    }

    /**
     * Eliminar Clasificacion dado un id
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Clasificacion",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/clasificacion/clasificador/{id}")
     * @param Request $request El objeto Request de la petición
     *
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Clasificacion
     */
    public function deleteClasificacionAction($id) {
        try {
            $idon = null;
            $idor = null;
            $em = $this->getDoctrine()->getManager();
            $objetoclasificacion = null;
            $objetoclasificador = null;
            $objetopreguntas = null;

            //Almaceno los id de la clasificación a eliminar y el clasificador al que pertenece.
            $idon = $id;
            $objetoclasificacion = $em->getRepository("RecordsClassifiersBundle:Clasificacion")->findOneBy(array('id' => $idon));



            if (!is_null($objetoclasificacion)) {
                $objectclasificador = $objetoclasificacion->getClasificador();
                //Obtengo los CI asociados a la clasificaion a eliminar.
                $centroinformante = $objetoclasificacion->getCentrosInformantes();
                if (!is_null($centroinformante)) {
                    //Obtengo el objeto clasificador de la clasificacion a eliminar para obtener las preguntas asociados.

                    $objetopreguntas = $objectclasificador->getPreguntas();
                    if (!is_null($objetopreguntas)) {
                        $em->remove($objetoclasificacion);
                        $em->flush();

                        return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Clasification delete ok'))), HttpCode::HTTP_OK);
                    } else {
                        return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Clasification delete failed encuestas'))), HttpCode::HTTP_SERVER_ERROR);
                    }
                } else {
                    return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Clasification delete failed centrosinformantes'))), HttpCode::HTTP_SERVER_ERROR);
                }
            } else {
                return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Clasification delete failed no existe'))), HttpCode::HTTP_SERVER_ERROR);
            }
        } catch (Exception $e) {
            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Clasification delete failed server error'))), HttpCode::HTTP_SERVER_ERROR);
        }
    }

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * Eliminar varias clasificaciones
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Clasificacion",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/clasificacion/clasificador")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de Clasificacion
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Clasificacion
     */
    public function deleteClasificacionesAction(Request $request) {
        try {
            $idon = null;
            $idor = null;
            $objetoclasificacion = null;
            $objetoclasificador = null;
            $objetopreguntas = null;
            $recordsFailed = array();
            $params = json_decode($request->request->get('ids'));
            $em = $this->getDoctrine()->getManager();
            foreach ($params as $id) {
                //Almaceno los id de las clasificaciones a eliminar y el clasificador al que pertenece.
                $idon = $id;
                $objetoclasificacion = $em->getRepository("RecordsClassifiersBundle:Clasificacion")->findOneBy(array('id' => $idon));
                if (!is_null($objetoclasificacion)) {
                    $objectclasificador = $objetoclasificacion->getClasificador();
                    //Obtengo los CI asociados a la clasificaion a eliminar.
                    $centroinformante = $objetoclasificacion->getCentrosInformantes();
                    if (!is_null($centroinformante)) {
                        //Obtengo el objeto clasificador de la clasificacion a eliminar para obtener las preguntas asociadas.
                        $objetopreguntas = $objectclasificador->getPreguntas();
                        if (!is_null($objetopreguntas)) {
                            $em->remove($objetoclasificacion);
                            $em->flush();
                        } else {
                            $recordsFailed['id'] = $id;
                            return new Response(json_encode(array("success" => false, "data" => $recordsFailed, "message" => $this->get('translator')->trans('Clasification delete failed encuestas'))), HttpCode::HTTP_SERVER_ERROR);
                        }
                    } else {
                        $recordsFailed['id'] = $id;
                        return new Response(json_encode(array("success" => false, "data" => $recordsFailed, "message" => $this->get('translator')->trans('Clasification delete failed centrosinformantes'))), HttpCode::HTTP_SERVER_ERROR);
                    }
                } else {
                    $recordsFailed['id'] = $id;
                    return new Response(json_encode(array("success" => false, "data" => $recordsFailed, "message" => $this->get('translator')->trans('Clasification delete failed no existe'))), HttpCode::HTTP_SERVER_ERROR);
                }
            }
            if (!count($recordsFailed)) {
                return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Clasifications delete ok'))), HttpCode::HTTP_OK);
            } else {
                return new Response(json_encode(array("success" => false, "data" => $recordsFailed, "message" => $this->get('translator')->trans('Clasifications delete failed server error'))), HttpCode::HTTP_SERVER_ERROR);
            }
        } catch (Exception $ex) {
            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Clasification delete failed server error'))), HttpCode::HTTP_SERVER_ERROR);
        }
    }

//    public function searchClasificationByIdAction($dataaux, $clasifications) {
//        foreach ($clasifications as $clasification) {
//            if ($clasification->getId)
//        }
//    }
}
