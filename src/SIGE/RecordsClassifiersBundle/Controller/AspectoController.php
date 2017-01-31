<?php

/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\RecordsClassifiersBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use SIGE\SigeBundle\HandlerRest\HttpCode;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\View\View;
use \FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializationContext;
use FOS\RestBundle\Controller\Annotations;
use Symfony\Component\Form\FormTypeInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class AspectoController extends FOSRestController {

    private $entityClass = 'SIGE\RecordsClassifiersBundle\Entity\Aspecto';
    private $formType = 'SIGE\RecordsClassifiersBundle\Form\AspectoType';

    /**
     * ***Trazabilidad del Código***
     * Módulo: Gestión de la Configuración
     * Caso de Uso: Gestionar Aspectos
     * RF: 29 Listar Aspectos
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar Aspecto",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/aspecto")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="15", description="Cantidad de resultados que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     *
     * @return View
     */
    public function getAspectosAction(Request $request, ParamFetcherInterface $paramFetcher) {
        try {
            $query = $request->query->get("query");
            $filtres = array();
            $search_type = 0; //1 es simple y 2 avanzada 0 listado sin filtro
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

            return new Response(json_encode(array("success" => true, "data" => json_decode($jsonData), "length" => $length, HttpCode::HTTP_OK)));

            return $response;
        } catch (\Exception $e) {
            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Aspect get error'), HttpCode::HTTP_SERVER_ERROR)));
        }
    }

    /**
     * ***Trazabilidad del Código***
     * Módulo: Gestión de la Configuración
     * Caso de Uso: Gestionar Aspectos
     * RF: 29 Listar Aspectos
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener Aspecto dado su id",
     *   output = "Aspecto",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/aspecto/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id del Aspecto
     *
     * @return array
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Aspecto
     */
    public function getAspectoAction($id) {
        try {
            return $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
        } catch (\Exception $e) {
            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Aspect get error'), HttpCode::HTTP_SERVER_ERROR)));
        }
    }

    /**
     * ***Trazabilidad del Código***
     * Módulo: Gestión de la Configuración
     * Caso de Uso: Gestionar Aspectos
     * RF: 26 Adicionar aspecto
     * @ApiDoc(
     *   resource = true,
     *   description = "Adicionar Aspecto",
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Aspecto",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/aspecto")
     * @param Request $request El objeto Request de la petición
     * @return FormTypeInterface|View
     */
    public function postAspectoAction(Request $request) {
        try {
            return $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
        } catch (\Exception $e) {
            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Aspect post error'), HttpCode::HTTP_SERVER_ERROR)));
        }
    }

    /**
     * ***Trazabilidad del Código***
     * Módulo: Gestión de la Configuración
     * Caso de Uso: Gestionar Aspectos
     * RF: 28 Editar aspecto
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Aspecto",
     *   statusCodes = {
     *  201 = "Es retornado cuando Aspecto es creado",
     *  204 = "Es retornado si no existen errores",
     *  400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Put("/aspecto/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de Aspecto
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Aspecto
     */
    public function putAspectoAction(Request $request, $id) {
        try {
            $view = $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
            $data = $view->getData();
            if (!$data) {
                return $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
            } else {
                $alias = $data->getId();
                $params = $request->request->all();
                $aliasSuper = $params["aliassuperior"];
                if ($aliasSuper && $alias == $aliasSuper) {
                    return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Aspect equals superior error'), HttpCode::HTTP_UNOFFICIALI)));
                }
                $countTemplates = $data->getPaginaaspectos()->count();
                if ($countTemplates > 0) {
                    return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Aspect dependency template error'), HttpCode::HTTP_UNOFFICIALI)));
                }
                return $this->container->get('sige.class.handler')->put($view->getData(), $params, $this->entityClass, $this->formType);
            }
        } catch (\Exception $e) {
            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Aspect put error'), HttpCode::HTTP_SERVER_ERROR)));
        }
    }

    /**
     * ***Trazabilidad del Código***
     * Módulo: Gestión de la Configuración
     * Caso de Uso: Gestionar Aspectos
     * RF: 28 Editar aspecto
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Aspecto",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Patch("/aspecto/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de Aspecto
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Aspecto
     */
    public function patchAspectoAction(Request $request, $id) {
        try {
            return $this->container->get('sige.class.handler')->patch($this->get($id), $request->request->all(), $this->entityClass, $this->formType);
        } catch (\Exception $e) {
            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Aspect patch error'), HttpCode::HTTP_SERVER_ERROR)));
        }
    }

    /**
     * ***Trazabilidad del Código***
     * Módulo: Gestión de la Configuración
     * Caso de Uso: Gestionar Aspectos
     * RF: 27 Eliminar aspecto.
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Aspecto",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/aspecto/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de Aspecto
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Aspecto
     */
    public function deleteAspectoAction(Request $request, $id) {
        try {
            $view = $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
            $data = $view->getData();

            if ($data) {
                $filtres["aliassuperior"] = $data->getId();
                $childsAspects = $this->container->get('sige.class.handler')->allRange(null, $this->entityClass, $this->formType, $filtres, 2);
                if (count($childsAspects->getData()) > 0) {
                    return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Aspect dependency aspectSuperior error'), HttpCode::HTTP_UNOFFICIALI)));
                }
                $countTemplates = $data->getPaginaaspectos()->count();
                if ($countTemplates > 0) {
                    return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Aspect dependency template error'), HttpCode::HTTP_UNOFFICIALI)));
                } else {
                    return $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
                }
            }
        } catch (\Exception $e) {
            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Aspect delete error'), HttpCode::HTTP_SERVER_ERROR)));
        }
    }

    /**
     * ***Trazabilidad del Código***
     * Módulo: Gestión de la Configuración
     * Caso de Uso: Gestionar Aspectos
     * RF: 27 Eliminar aspecto.
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Aspecto",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/aspecto")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de Aspecto
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Aspecto
     */
    public function deleteAspectosAction(Request $request) {
        try {
            $params = json_decode($request->request->get('ids'));
            $results = array();
            foreach ($params as $id) {
                $res = $this->deleteAspectoAction($request, $id);
                if (is_array($res) && !$res["success"]) {
                    $results["id"] = new Response(json_encode(array("success" => false, "message" => $res["message"], HttpCode::HTTP_UNOFFICIALI)));
                } else if ($res instanceof Response) {
                    $results["id"] = $res;
                }
            }
            if (count($results) > 0) {
                return new Response(json_encode(array("success" => false, "errors" => $results, "message" => $this->get('translator')->trans('Aspect delete error'), HttpCode::HTTP_UNOFFICIALI)));
            } else {
                return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Aspects post success'), HttpCode::HTTP_OK)));
            }
        } catch (\Exception $e) {
            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Aspect delete error'), HttpCode::HTTP_SERVER_ERROR)));
        }
    }

}
