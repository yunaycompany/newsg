<?php

/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\DataEntryBundle\Controller;

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

class ModeloController extends FOSRestController {

    private $entityClass = 'SIGE\DataEntryBundle\Entity\Modelo';
    private $formType = 'SIGE\DataEntryBundle\Form\ModeloType';

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar Modelo",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/modelo")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="15", description="Cantidad de resultados que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     *
     * @return View
     */
    public function getModelosAction(Request $request, ParamFetcherInterface $paramFetcher) {
        $query = $request->query->get("query");
        $filtros = array();
        if ($query) {
            $filtros = (array) json_decode($query);
            $filtros = array_filter($filtros);
        }
        $dataByRange = $this->container->get('sige.class.handler')->allRange($paramFetcher, $this->entityClass, $this->formType, $filtros);
        $data = $dataByRange->getData();
        $allData = $this->container->get('sige.class.handler')->all($this->entityClass, $this->formType);
        $length = count($allData->getData());
        $jsonData = $this->container->get('jms_serializer')->serialize($data, "json", SerializationContext::create()->enableMaxDepthChecks());
        $response = new Response("{'success': true, 'data':" . $jsonData . ",'length':" . $length . "}", "200");

        return $response;
    }

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar Modelo por arbol",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/modelo/root")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="15", description="Cantidad de resultados que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     *
     * @return View
     */
    public function getModelosTreeAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $allData = $this->container->get('sige.class.handler')->all($this->entityClass, $this->formType);
        $jsonData = $this->container->get('jms_serializer')->serialize($allData->getData(), "json");

        $repository = $em->getRepository('DataEntryBundle:Modelo');
        //$query = $repository->createQueryBuilder('c.anno')->distinct()->getQuery()->getResult();
        //$jsonData = $this->container->get('jms_serializer')->serialize($query, "json");
        
        $response = new Response("{'success': true, 'children':" . $jsonData . "}", "200");
        return $response;
    }

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener Modelo dado su id",
     *   output = "Modelo",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/modelo/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id del Modelo
     *
     * @return array
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Modelo
     */
    public function getModeloAction($id) {
        return $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   description = "Adicionar Modelo",
     *   input = "SIGE\DataEntryBundle\Entity\Modelo",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/modelo")
     * @param Request $request El objeto Request de la petición
     * @return FormTypeInterface|View
     */
    public function postModeloAction(Request $request) {
        return $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\DataEntryBundle\Entity\Modelo",
     *   statusCodes = {
     *  201 = "Es retornado cuando Modelo es creado",
     *  204 = "Es retornado si no existen errores",
     *  400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Put("/modelo/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Modelo
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Modelo
     */
    public function putModeloAction(Request $request, $id) {
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
     *   input = "SIGE\DataEntryBundle\Entity\Modelo",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Patch("/modelo/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Modelo
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Modelo
     */
    public function patchModeloAction(Request $request, $id) {
        return $this->container->get('sige.class.handler')->patch($this->get($id), $request->request->all(), $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\DataEntryBundle\Entity\Modelo",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/modelo/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Modelo
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Modelo
     */
    public function deleteModeloAction(Request $request, $id) {
        return $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código*** 
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\DataEntryBundle\Entity\Modelo",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/modelo")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Modelo
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Modelo
     */
    public function deleteModelosAction(Request $request) {
        $params = $request->request->all();
        foreach ($params as $id) {
            $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
        }
    }

}
