<?php

/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:16
 */

namespace SIGE\RecordsClassifiersBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\View\View;
use \FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Controller\Annotations;
use Symfony\Component\Form\FormTypeInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;
use SIGE\SigeBundle\HandlerRest\HttpCode;

class SistemadeinformacionController extends FOSRestController {

    private $entityClass = 'SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion';
    private $formType = 'SIGE\RecordsClassifiersBundle\Form\SistemadeinformacionType';

    /**
     * Listar Sistemadeinformacion
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar Sistemadeinformacion",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/sistemadeinformacion")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="5", description="Cantidad de páginas que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     *
     * @return View
     */
    public function getSistemadeinformacionsAction(Request $request, ParamFetcherInterface $paramFetcher) {
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

            return $response;
        } catch (\Exception $exc) {
            return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Infosystem list failed'))), HttpCode::HTTP_SERVER_ERROR);
        }
    }

    /**
     * Obtener Sistemadeinformacion dado su id
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener Sistemadeinformacion dado su id",
     *   output = "Sistemadeinformacion",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/sistemadeinformacion/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id del Sistemadeinformacion
     *
     * @return array
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Sistemadeinformacion
     */
    public function getSistemadeinformacionAction($id) {
        try {
            return $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
        } catch (\Exception $exc) {
            return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Infosystem list by id failed'))), HttpCode::HTTP_SERVER_ERROR);
        }
    }

    /**
     * Adicionar Sistemadeinformacion.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Adicionar Sistemadeinformacion",
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/sistemadeinformacion")
     * @param Request $request El objeto Request de la petición
     * @return FormTypeInterface|View
     */
    public function postSistemadeinformacionAction(Request $request) {
        try {
            $respuesta = $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
            if ($respuesta["success"]) {
                $respuesta["message"] = $this->get('translator')->trans('Infosystem post success');
            }
            return new Response(json_encode(array("success" => true, "message" => $respuesta["message"])), HttpCode::HTTP_OK);
        } catch (\Exception $exc) {
            return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Infosystem post error'))), HttpCode::HTTP_SERVER_ERROR);
        }
    }

    /**
     * Si no existe el id de Sistemadeinformacion Adiciona, si existe Modifica
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion",
     *   statusCodes = {
     *  201 = "Es retornado cuando Sistemadeinformacion es creado",
     *  204 = "Es retornado si no existen errores",
     *  400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Put("/sistemadeinformacion/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de Sistemadeinformacion
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Sistemadeinformacion
     */
    public function putSistemadeinformacionAction(Request $request, $id) {
        try {
            $view = $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
            if (!$view->getData()) {
                $respuesta = $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
                if ($respuesta["success"]) {
                    $respuesta["message"] = $this->get('translator')->trans('Infosystem post success');
                }
                return new Response(json_encode(array("success" => true, "message" => $respuesta["message"])), HttpCode::HTTP_OK);
            } else {
                $respuesta = $this->container->get('sige.class.handler')->put($view->getData(), $request->request->all(), $this->entityClass, $this->formType);
                if ($respuesta["success"]) {
                    $respuesta["message"] = $this->get('translator')->trans('Infosystem put success');
                }
                return new Response(json_encode(array("success" => true, "message" => $respuesta["message"])), HttpCode::HTTP_OK);
            }
        } catch (\Exception $exc) {
            return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Infosystem put error'))), HttpCode::HTTP_SERVER_ERROR);
        }
    }

    /**
     * Actualiza o Crea Sistemadeinformacion en un lugar específico
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Patch("/sistemadeinformacion/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de Sistemadeinformacion
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Sistemadeinformacion
     */
    public function patchSistemadeinformacionAction(Request $request, $id) {
        try {
            return $this->container->get('sige.class.handler')->patch($this->get($id), $request->request->all(), $this->entityClass, $this->formType);
        } catch (\Exception $exc) {
            return new Response('{success:false, message:' . $exc->getMessage() . '}', $exc->getCode());
        }
    }

    /**
     * Eliminar Sistemadeinformacion dado un id
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/sistemadeinformacion/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de Sistemadeinformacion
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Sistemadeinformacion
     */
    public function deleteSistemadeinformacionAction(Request $request, $id) {
        /*
          //var_dump($id);die;
          si->>>registros  ok
          si->>>con modelos ok
          si->>>centrosinformantes  ok
          si->>>indicador  ok
          si->>>pie de firma  ok

          si->>>aspectos  NO ESTA
          si->>>clasificadores NO ESTA
          si->>>usuarios NO ESTA
         * /
         */
        try {
//            $SInformacion = null;
//            $Registros = null;
//            $Modelos = null;
//            $CInformantes = null;
//            $Indicadores = null;
//            $PFirma = null;
//            $Aspecto = null;
//            $Clasificadores = null;
//            $Usuarios = null;
//
//            $em = $this->getDoctrine()->getManager();
//            $SInformacion = $em->getRepository("RecordsClassifiersBundle:Sistemadeinformacion")->findOneBy(array('id' => $id));
//
//            if (!is_null($SInformacion)) {
//                if (!is_null($Registros)) {
//                    if (!is_null($Modelos)) {
//                        if (!is_null($CInformantes)) {
//                            if (!is_null($Indicadores)) {
//                                if (!is_null($PFirma)) {
//                                    if (!is_null($Aspecto)) {
//                                        if (!is_null($Clasificadores)) {
//                                            if (!is_null($Usuarios)) {
//                                                
//                                            } else {
//                                                return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Delete sistema de informacion failed by users'))), HttpCode::HTTP_SERVER_ERROR);
//                                            }
//                                        } else {
//                                            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Delete sistema de informacion failed by classifier'))), HttpCode::HTTP_SERVER_ERROR);
//                                        }
//                                    } else {
//                                        return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Delete sistema de informacion failed by aspect'))), HttpCode::HTTP_SERVER_ERROR);
//                                    }
//                                } else {
//                                    return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Delete sistema de informacion failed by pie firma'))), HttpCode::HTTP_SERVER_ERROR);
//                                }
//                            } else {
//                                return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Delete sistema de informacion failed by indicators'))), HttpCode::HTTP_SERVER_ERROR);
//                            }
//                        } else {
//                            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Delete sistema de informacion failed by information center'))), HttpCode::HTTP_SERVER_ERROR);
//                        }
//                    } else {
//                        return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Delete sistema de informacion failed by model'))), HttpCode::HTTP_SERVER_ERROR);
//                    }
//                } else {
//                    return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Delete sistema de informacion failed by register'))), HttpCode::HTTP_SERVER_ERROR);
//                }
//            } else {
//                return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Delete sistema de informacion failed not found'))), HttpCode::HTTP_SERVER_ERROR);
//            }
            
            $respuesta = $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
            if ($respuesta["success"]) {
                $respuesta["message"] = $this->get('translator')->trans('Infosystem delete success');
            }
            return new Response(json_encode(array("success" => true, "message" => $respuesta["message"])), HttpCode::HTTP_OK);
        } catch (\Exception $exc) {
            return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Infosystem delete error'))), HttpCode::HTTP_SERVER_ERROR);
        }
    }

    /**
     * Eliminar Sistemadeinformacion dado varios id
     *
     * @ApiDoc(
     *   resource = true,
     *   input ="SIGE\SecurityManagerBundle\Entity\Sistemadeinformacion",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/sistemadeinformacion")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de Sistemadeinformacion
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Entidad
     */
    public function deleteSistemasdeinformacionAction(Request $request) {
        try {
            $params = json_decode($request->request->get('ids'));
            foreach ($params as $id) {
                $respuesta = $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
            }
            if ($respuesta["success"]) {
                $respuesta["message"] = $this->get('translator')->trans('Infosystems delete success');
            }
            return new Response(json_encode(array("success" => true, "message" => $respuesta["message"])), HttpCode::HTTP_OK);
        } catch (\Exception $exc) {
            return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Infosystems delete error'))), HttpCode::HTTP_SERVER_ERROR);
        }
    }

}
