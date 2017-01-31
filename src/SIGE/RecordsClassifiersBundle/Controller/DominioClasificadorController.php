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
use FOS\RestBundle\Controller\Annotations;
use Symfony\Component\Form\FormTypeInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;


class DominioClasificadorController extends FOSRestController
{

    private $entityClass = 'SIGE\RecordsClassifiersBundle\Entity\DominioClasificador';
    private $formType = 'SIGE\RecordsClassifiersBundle\Form\DominioClasificadorType';


    /**
     * Listar DominioClasificador
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar DominioClasificador",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/dominioclasificador")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="15", description="Cantidad de resultados que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     *
     * @return View
     */
    public function getDominioClasificadorsAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $query = $request->query->get("query");
        $filtros = array();
        if ($query && is_array($query)) {
            $filtros = (array)json_decode($query);
            $filtros = array_filter($filtros);
        }
        $dataByRange = $this->container->get('sige.class.handler')->allRange($paramFetcher, $this->entityClass, $this->formType, $filtros);
        $data = $dataByRange->getData();
        $allData = $this->container->get('sige.class.handler')->all($this->entityClass, $this->formType);
        $length = count($allData->getData());
        $jsonData = $this->container->get('jms_serializer')->serialize($data, "json");
        $response = new Response("{'success': true, 'data':" . $jsonData . ",'length':" . $length . "}", "200");

        return $response;
    }


    /**
     * Obtener DominioClasificador dado su id
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener DominioClasificador dado su id",
     *   output = "DominioClasificador",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/dominioclasificador/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id del DominioClasificador
     *
     * @return array
     *
     * @throws NotFoundHttpException No existe ninguna entrada en DominioClasificador
     */
    public function getDominioClasificadorAction($id)
    {
        return $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
    }

    /**
     * Adicionar DominioClasificador.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Adicionar DominioClasificador",
     *   input = "SIGE\RecordsClassifiersBundle\Entity\DominioClasificador",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/dominioclasificador")
     * @param Request $request El objeto Request de la petición
     * @return FormTypeInterface|View
     */
    public function postDominioClasificadorAction(Request $request)
    {
        return $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
    }

    /**
     * Si no existe el id de DominioClasificador Adiciona, si existe Modifica
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\DominioClasificador",
     *   statusCodes = {
     *  201 = "Es retornado cuando DominioClasificador es creado",
     *  204 = "Es retornado si no existen errores",
     *  400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Put("/dominioclasificador/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de DominioClasificador
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en DominioClasificador
     */
    public function putDominioClasificadorAction(Request $request, $id)
    {
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
     * Actualiza o Crea DominioClasificador en un lugar específico
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\DominioClasificador",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Patch("/dominioclasificador/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de DominioClasificador
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en DominioClasificador
     */
    public function patchDominioClasificadorAction(Request $request, $id)
    {
        return $this->container->get('sige.class.handler')->patch($this->get($id), $request->request->all(), $this->entityClass, $this->formType);
    }

    /**
     * Eliminar DominioClasificador dado un id
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\DominioClasificador",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/dominioclasificador/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de DominioClasificador
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de DominioClasificador
     */
    public function deleteDominioClasificadorAction(Request $request, $id)
    {
        return $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
    }

    /**
     * Eliminar DominioClasificador dado varios id
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\DominioClasificador",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/dominioclasificador")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de DominioClasificador
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de DominioClasificador
     */
    public function deleteDominioClasificadorsAction(Request $request)
    {
        $params = $request->request->all();
        foreach ($params as $id) {
            $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
        }
    }


}
