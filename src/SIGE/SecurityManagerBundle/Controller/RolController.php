<?php

/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\SecurityManagerBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializationContext;
use \FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Controller\Annotations;
use Symfony\Component\Form\FormTypeInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class RolController extends FOSRestController {

    private $entityClass = 'SIGE\SecurityManagerBundle\Entity\Rol';
    private $formType = 'SIGE\SecurityManagerBundle\Form\RolType';

    /**
     * Listar Rol
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar Rol",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/rol")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="15", description="Cantidad de resultados que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     *
     * @return View
     */
    public function getRolsAction(Request $request, ParamFetcherInterface $paramFetcher) {
        try {
            $query = $request->query->get("query");
            $filtros = array();
            if ($query) {
                $filtros = (array) json_decode($query);
                $filtros = array_filter($filtros);
            }
            $dataByRange = $this->container->get('sige.class.handler')->allRange($paramFetcher, $this->entityClass, $this->formType, $filtros);
            $data = $dataByRange->getData();
            $allData = $this->container->get('sige.class.handler')->all($this->entityClass, $this->formType);
            $length = count($allData);
            $jsonData = $this->container->get('jms_serializer')->serialize($data, "json");
            $response = new Response("{'success': true, 'data':" . $jsonData . ",'length':" . $length . "}", "200");

            return $response;
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('Rol get error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Obtener Rol dado su id
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener Rol dado su id",
     *   output = "Rol",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/rol/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id del Rol
     *
     * @return array
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Rol
     */
    public function getRolAction($id) {
        try {
            return $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('Rol get error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Adicionar Rol.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Adicionar Rol",
     *   input = "SIGE\SecurityManagerBundle\Entity\Rol",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/rol")
     * @param Request $request El objeto Request de la petición
     * @return FormTypeInterface|View
     */
    public function postRolAction(Request $request) {
        try {
            $respuesta = $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
            if ($respuesta["success"]) {
                $respuesta["message"] = $this->get('translator')->trans('Rol add');
            }

            return new Response(json_encode($respuesta), $respuesta["code"]);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('Rol post error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Si no existe el id de Rol Adiciona, si existe Modifica
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\Rol",
     *   statusCodes = {
     *  201 = "Es retornado cuando Rol es creado",
     *  204 = "Es retornado si no existen errores",
     *  400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Put("/rol/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Rol
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Rol
     */
    public function putRolAction(Request $request, $id) {
        try {
            $view = $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
            if (!$view->getData()) {
                $respuesta = $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
                if ($respuesta["success"]) {
                    $respuesta["message"] = $this->get('translator')->trans('Rol add');
                }
            } else {
                $respuesta = $this->container->get('sige.class.handler')->put($view->getData(), $request->request->all(), $this->entityClass, $this->formType);
                if ($respuesta["success"]) {
                    $respuesta["message"] = $this->get('translator')->trans('Rol modified');
                }
            }
            return new Response(json_encode($respuesta), $respuesta["code"]);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('Rol get error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Actualiza o Crea Rol en un lugar específico
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\Rol",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Patch("/rol/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Rol
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Rol
     */
    public function patchRolAction(Request $request, $id) {
        try {
            return $this->container->get('sige.class.handler')->patch($this->get($id), $request->request->all(), $this->entityClass, $this->formType);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('Rol patch error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Eliminar Rol dado un id
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\Rol",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/rol/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Rol
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Rol
     */
    public function deleteRolAction(Request $request, $id) {
        try {
            $respuesta = $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
            if ($respuesta["success"]) {
                $respuesta["message"] = $this->get('translator')->trans('Rol eliminated');
            }
            return new Response(json_encode($respuesta), $respuesta["code"]);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('Rol delete error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Eliminar Rol dado varios id
     *
     * @ApiDoc(
     *   resource = true,
     *   input ="SIGE\SecurityManagerBundle\Entity\Rol",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/rol")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Rol
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Rol
     */
    public function deleteRolesAction(Request $request) {
      try{  $params = json_decode($request->request->get('ids'));

        foreach ($params as $id) {
            $respuesta = $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
        }
        return new Response(json_encode($respuesta), $respuesta["code"]);
      }catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('Rol delete error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

}
