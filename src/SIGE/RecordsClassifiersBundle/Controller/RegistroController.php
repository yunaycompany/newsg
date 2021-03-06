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

class RegistroController extends FOSRestController {

    private $entityClass = 'SIGE\RecordsClassifiersBundle\Entity\Registro';
    private $formType = 'SIGE\RecordsClassifiersBundle\Form\RegistroType';

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar Registro",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/manage_registers")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="15", description="Cantidad de resultados que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     *
     * @return View
     */
    public function getRegistrosAction(Request $request, ParamFetcherInterface $paramFetcher) {
        try {
            $dataByRange = $this->container->get('sige.class.handler')->allRange($paramFetcher, $this->entityClass, $this->formType);
            $data = $dataByRange->getData();
            $allData = $this->container->get('sige.class.handler')->all($this->entityClass, $this->formType);
            $length = count($allData->getData());            
            $jsonData = $this->container->get('jms_serializer')->serialize($data, "json");
            var_dump($jsonData);die;
            $response = new Response("{'success': true, 'data':" . $jsonData . ",'length':" . $length . "}", "200");

            return $response;
        } catch (Exception $ex) {
           return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Clasification list failed'))), '200'); 
        }
    }

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener Registro dado su id",
     *   output = "Registro",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/registro/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id del Registro
     *
     * @return array
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Registro
     */
    public function getRegistroAction($id) {
        return $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   description = "Adicionar Registro",
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Registro",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/registro")
     * @param Request $request El objeto Request de la petición
     * @return FormTypeInterface|View
     */
    public function postRegistroAction(Request $request) {
        return $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Registro",
     *   statusCodes = {
     *  201 = "Es retornado cuando Registro es creado",
     *  204 = "Es retornado si no existen errores",
     *  400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Put("/registro/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Registro
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Registro
     */
    public function putRegistroAction(Request $request, $id) {
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
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Registro",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Patch("/registro/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Registro
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Registro
     */
    public function patchRegistroAction(Request $request, $id) {
        return $this->container->get('sige.class.handler')->patch($this->get($id), $request->request->all(), $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Registro",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/registro/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Registro
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Registro
     */
    public function deleteRegistroAction(Request $request, $id) {
        return $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Registro",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/registro")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Registro
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Registro
     */
    public function deleteRegistrosAction(Request $request) {
        $params = $request->request->all();
        foreach ($params as $id) {
            $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
        }
    }

}
