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
use \FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializationContext;
use FOS\RestBundle\Controller\Annotations;
use Symfony\Component\Form\FormTypeInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class AuthTypeController extends FOSRestController {

    private $entityClass = 'SIGE\SecurityManagerBundle\Entity\AuthType';
    private $formType = 'SIGE\SecurityManagerBundle\Form\AuthTypeType';

    /**
     * Listar AuthType
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar AuthType",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/authtype")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="15", description="Cantidad de resultados que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     *
     * @return View
     */
    public function getAuthTypesAction(Request $request, ParamFetcherInterface $paramFetcher) {
        try {
            $dataByRange = $this->container->get('sige.class.handler')->allRange($paramFetcher, $this->entityClass, $this->formType);
            $data = $dataByRange->getData();
            $allData = $this->container->get('sige.class.handler')->all($this->entityClass, $this->formType);
            $length = count($allData->getData());
            $jsonData = $this->container->get('jms_serializer')->serialize($data, "json");
            $response = new Response("{'success': true, 'data':" . $jsonData . ",'length':" . $length . "}", "200");

            return $response;
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('Auth get error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Obtener AuthType dado su id
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener AuthType dado su id",
     *   output = "AuthType",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/authtype/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id del AuthType
     *
     * @return array
     *
     * @throws NotFoundHttpException No existe ninguna entrada en AuthType
     */
    public function getAuthTypeAction($id) {
        try {
            return $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('Auth get error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Adicionar AuthType.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Adicionar AuthType",
     *   input = "SIGE\SecurityManagerBundle\Entity\AuthType",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/authtype")
     * @param Request $request El objeto Request de la petición
     * @return FormTypeInterface|View
     */
    public function postAuthTypeAction(Request $request) {
        try {
            return $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('Auth post error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Si no existe el id de AuthType Adiciona, si existe Modifica
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\AuthType",
     *   statusCodes = {
     *  201 = "Es retornado cuando AuthType es creado",
     *  204 = "Es retornado si no existen errores",
     *  400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Put("/authtype/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de AuthType
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en AuthType
     */
    public function putAuthTypeAction(Request $request, $id) {
        try {
            $view = $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
            if (!$view->getData()) {
                return $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
            } else {
                return $this->container->get('sige.class.handler')->put($view->getData(), $request->request->all(), $this->entityClass, $this->formType);
            }
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('Auth put error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Actualiza o Crea AuthType en un lugar específico
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\AuthType",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Patch("/authtype/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de AuthType
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en AuthType
     */
    public function patchAuthTypeAction(Request $request, $id) {
        try {
            return $this->container->get('sige.class.handler')->patch($this->get($id), $request->request->all(), $this->entityClass, $this->formType);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('Auth patch error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Eliminar AuthType dado un id
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\AuthType",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/authtype/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de AuthType
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de AuthType
     */
    public function deleteAuthTypeAction(Request $request, $id) {
        try {
            return $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('Auth delete error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Eliminar AuthType dado varios id
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\AuthType",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/allauthtype")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de AuthType
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de AuthType
     */
    public function deleteAuthTypesAction(Request $request) {
        try {
            $params = $request->request->all();
            foreach ($params as $id) {
                $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
            }
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('Auth delete error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

}
