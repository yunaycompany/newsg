<?php

/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\RecordsClassifiersBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\View\View;
use \FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializationContext;
use FOS\RestBundle\Controller\Annotations;
use Symfony\Component\Form\FormTypeInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use SIGE\SigeBundle\HandlerRest\HttpCode;

class TematicaController extends FOSRestController {

    private $entityClass = 'SIGE\RecordsClassifiersBundle\Entity\Tematica';
    private $formType = 'SIGE\RecordsClassifiersBundle\Form\TematicaType';

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar Tematica",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/tematica")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="15", description="Cantidad de resultados que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     *
     * @return View
     */
    public function getTematicasAction(Request $request, ParamFetcherInterface $paramFetcher) {

        try {
            $query = $request->query->get("query");
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
            $length = 0;
            if (count($data) > 0) {
                $allData = $this->container->get('sige.class.handler')->all($this->entityClass, $this->formType);
                $length = count($allData->getData());
            }
            $jsonData = $this->container->get('jms_serializer')->serialize($data, "json");
            $response = new Response("{'success': true, 'data':" . $jsonData . ",'length':" . $length . "}", HttpCode::HTTP_OK);

            try {
                $query = $request->query->get("query");
                $filters = $request->query->get("filter");
                $search_type = 0;
                $filtros = array();
                if ($query) {
                    $filtros = (array) json_decode($query);
                    if (isset($filtros['simple_search'])) {
                        $search_type = 1;
                        $filtros['simple_search'] = '';
                    } else {
                        $search_type = 2;
                    }
                    $filtros = array_filter($filtros);
                } else if ($filters) {
                    $filters = json_decode($filters);
                    foreach ($filters as $filter) {
                        $filtros[$filter->property] = $filter->value;
                    }
                    $filtros = array_filter($filtros);
                }
                $dataByRange = $this->container->get('sige.class.handler')->allRange($paramFetcher, $this->entityClass, $this->formType, $filtros, $search_type);
                $data = $dataByRange->getData();
                $allData = $this->container->get('sige.class.handler')->all($this->entityClass, $this->formType);
                $length = count($allData->getData());
                $jsonData = $this->container->get('jms_serializer')->serialize($data, "json");
                $response = new Response("{'success': true, 'data':" . $jsonData . ",'length':" . $length . "}", "200");



                return $response;
            } catch (Exception $ex) {
                return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Imposible Get')), HttpCode::HTTP_OK));
            }

            return $response;
        } catch (\Exception $ex) {
            return new Response(json_encode(array("success" => false, "message" => 'Este es mi error')), HttpCode::HTTP_SERVER_ERROR);
        }
    }

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener Tematica dado su id",
     *   output = "Tematica",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/tematica/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id del Tematica
     *
     * @return array
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Tematica
     */
    public function getTematicaAction($id) {
        return $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   description = "Adicionar Tematica",
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Tematica",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/tematica")
     * @param Request $request El objeto Request de la petición
     * @return FormTypeInterface|View
     */
    public function postTematicaAction(Request $request) {
        return $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Tematica",
     *   statusCodes = {
     *  201 = "Es retornado cuando Tematica es creado",
     *  204 = "Es retornado si no existen errores",
     *  400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Put("/tematica/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Tematica
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Tematica
     */
    public function putTematicaAction(Request $request, $id) {
//         $req = [];
//        $req['id'] = $request->request->get('id');
//        $req['nombredescriptivo'] = $request->request->get('nombredescriptivo');
//        $req['descripcion'] = $request->request->get('descripcion');
//        $req['tipoindicadoraspecto'] = $request->request->get('tipoindicadoraspecto');
        $view = $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
        if (!$view->getData()) {
//                $statusCode = Codes::HTTP_CREATED;
            return $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
        } else {
//                $statusCode = Codes::HTTP_NO_CONTENT;
            return $this->container->get('sige.class.handler')->put($view->getData(), $request->request->all(), $this->entityClass, $this->formType);
        }
    }

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Tematica",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Patch("/tematica/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Tematica
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Tematica
     */
    public function patchTematicaAction(Request $request, $id) {
        return $this->container->get('sige.class.handler')->patch($this->get($id), $request->request->all(), $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Tematica",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/tematica/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Tematica
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Tematica
     */
    public function deleteTematicaAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $tematica = $em->getRepository('RecordsClassifiersBundle:Tematica')->find($id);
        if (!$tematica) {
            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Delete Tematica Failed not found'))), '200');
        }
        $indicadoresasociados = array();
        if (count($tematica->getIndicadores()) > 0) {
            foreach ($tematica->getIndicadores() as $ind) {
                $indicadoresasociados [] = $ind->getNombredescriptivo();
            }
        }
        $aspectosasociados = array();
        if (count($tematica->getAspectos()) > 0) {
            foreach ($tematica->getAspectos() as $asp) {
                $aspectosasociados [] = $asp->getNombredescriptivo();
            }
        }
        if (count($aspectosasociados) > 0) {
//            return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Delete Tematica Failed by Aspects and Indicators') . json_encode($aspectosasociados))), '200');
            return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Delete Tematica Failed by Aspects and Indicators') )), '200');
        }
        if (count($indicadoresasociados) > 0) {
//            return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Delete Tematica Failed by Aspects and Indicators') . json_encode($indicadoresasociados))), '200');
            return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Delete Tematica Failed by Aspects and Indicators') )), '200');
        }
        return $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Tematica",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/tematica")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Tematica
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Tematica
     */
    public function deleteTematicasAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $params = json_decode($request->request->get('ids'));
        $idtematicasindicadores = [];
        $idtematicasaspectos = [];
        $cantdelete = [];
        $flag = false;
        foreach ($params as $id) {

            $tematica = $em->getRepository('RecordsClassifiersBundle:Tematica')->find($id);
            $aux = '';
            $aux.= 'Temática: ' . $tematica->getNombredescriptivo();
            if (count($tematica->getIndicadores()) > 0) {
                $aux.= ' Indicadores: ';
                foreach ($tematica->getIndicadores() as $ind)
                    $aux.= $ind->getNombredescriptivo() . ', ';
                $idtematicasindicadores[] = $aux;
            }

            if (count($tematica->getAspectos()) > 0) {
                $aux.= ' Aspectos: ';
                foreach ($tematica->getAspectos() as $asp)
                    $aux.= $asp->getNombredescriptivo() . ', ';
                $idtematicasaspectos[] = $aux;
            }


            if (count($idtematicasaspectos) == 0 && count($idtematicasindicadores) == 0) {
                $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
            } elseif (count($idtematicasaspectos) > 0) {
                $flag = true;
                $cantdelete[] = $idtematicasaspectos;
            } elseif (count($idtematicasindicadores) > 0) {
                $flag = true;
                $cantdelete[] = $idtematicasindicadores;
            }
        }
        if ($flag)
            return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Delete Tematica Failed by Aspects and Indicators') . json_encode($cantdelete))), '200');
        else
            return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Delete Tematica Ok'))), '200');
    }

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar Tematica de Indicadores",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/indicadorestematicas")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="15", description="Cantidad de resultados que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     *
     * @return View
     */
    public function getTematicasIndicatorsAction(Request $request, ParamFetcherInterface $paramFetcher) {
        try {
            $em = $this->getDoctrine()->getManager();
            $tematicas = $em->getRepository('RecordsClassifiersBundle:Tematica')->findAll();

            $arrayind_tematica = array();
            $result = array();
            foreach ($tematicas as $tematica) {

                // verifica si tiene indicadores asociados para ahorarnos una consulta
                if (count($tematica->getIndicadores()) != 0) {
                    $arrayind_tematica['id'] = $tematica->getId();
                    $arrayind_tematica['nombredescriptivo'] = $tematica->getNombredescriptivo();
                    $arrayind_tematica['descripcion'] = $tematica->getDescripcion();
                    $result[] = $arrayind_tematica;
                }
            }

//            $this->deleteTematicaAction($request, $id);



            $length = count($result);
            return new Response(json_encode(array("success" => true, "data" => $result, "length:" => $length), '200'));
        } catch (Exception $ex) {
            return new Response(json_encode(array("success" => false, "message" => 'Imposible mostrar temáticas', "length:" => $length), '500'));
        }
        if (count($idtematicasindicadores) != 0)
            return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Delete Tematica Failed by indicators'))), '200');
        return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Delete Tematica Failed by indicators'))), '200');
    }

}
