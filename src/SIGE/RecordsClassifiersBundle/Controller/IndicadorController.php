<?php

/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\RecordsClassifiersBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\View\View;
use \FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializationContext;
use FOS\RestBundle\Controller\Annotations;
use Symfony\Component\Form\FormTypeInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class IndicadorController extends FOSRestController
{

    private $entityClass = 'SIGE\RecordsClassifiersBundle\Entity\Indicador';
    private $formType = 'SIGE\RecordsClassifiersBundle\Form\IndicadorType';

    /**
     * ***Trazabilidad del Código***
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar Indicador",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/indicador")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="15", description="Cantidad de resultados que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     *
     * @return View
     */
    public function getIndicadorsAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        try {
            $query = $request->query->get("query");
            $filtres = array();
            $search_type = 0; //1 es simple y 2 avanzada
            if ($query) {
                $filtres = (array)json_decode($query);
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
            $response = new Response("{'success': true, 'data':" . $jsonData . ",'length':" . $length . "}", "200");

            return $response;
        } catch (\Exception $exc) {
            return new Response("{success: false, message: " . $exc->getMessage() . "}", $exc->getCode());
        }

    }

    /**
     * ***Trazabilidad del Código***
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener Indicador dado su id",
     *   output = "Indicador",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/indicador/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id del Indicador
     *
     * @return array
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Indicador
     */
    public function getIndicadorAction($id)
    {
        return $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código***
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   description = "Adicionar Indicador",
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Indicador",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/indicador")
     * @param Request $request El objeto Request de la petición
     * @return FormTypeInterface|View
     */
    public function postIndicadorAction(Request $request)
    {
        return $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código***
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Indicador",
     *   statusCodes = {
     *  201 = "Es retornado cuando Indicador es creado",
     *  204 = "Es retornado si no existen errores",
     *  400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Put("/indicador/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de Indicador
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Indicador
     */
    public function putIndicadorAction(Request $request, $id)
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
     * ***Trazabilidad del Código***
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Indicador",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Patch("/indicador/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de Indicador
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Indicador
     */
    public function patchIndicadorAction(Request $request, $id)
    {
        return $this->container->get('sige.class.handler')->patch($this->get($id), $request->request->all(), $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código***
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Indicador",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/indicador/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de Indicador
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Indicador
     */
    public function deleteIndicadorAction(Request $request, $id)
    {
        //in->>>no puede tener asociado modelos ok
        //
        return $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código***
     * Módulo: MODULO
     * Caso de Uso: CU
     * RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Indicador",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/indicador")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de Indicador
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Indicador
     */
    public function deleteIndicadorsAction(Request $request)
    {
        $params = $request->request->all();
        foreach ($params as $id) {
            $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
        }
    }

}
