<?php

/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */


namespace SIGE\ModelGeneratorBundle\Controller;

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



class IndicadorPaginaController extends FOSRestController
{

    private $entityClass =  'SIGE\ModelGeneratorBundle\Entity\IndicadorPagina';
    private $formType = 'SIGE\ModelGeneratorBundle\Form\IndicadorPaginaType';



    /**
     * ***Trazabilidad del Código*** 
     *Módulo: MODULO
     *Caso de Uso: CU
     *RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar IndicadorPagina",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/indicadorpagina")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="15", description="Cantidad de resultados que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     *
     * @return View
     */
    public function getIndicadorPaginasAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $query = $request->query->get("query");
        $filtros = array();
        if ($query) {
            $filtros = (array) json_decode($query);
            $filtros = array_filter($filtros);
        } 
        $dataByRange = $this->container->get('sige.class.handler')->allRange($paramFetcher, $this->entityClass, $this->formType,$filtros);
        $data = $dataByRange->getData();
        $allData = $this->container->get('sige.class.handler')->all($this->entityClass, $this->formType);
        $length = count($allData->getData());
        $jsonData = $this->container->get('jms_serializer')->serialize($data, "json");
        $response = new Response("{'success': true, 'data':" . $jsonData . ",'length':" . $length . "}", "200");


        return $response;

    }


    /**
     * ***Trazabilidad del Código*** 
     *Módulo: MODULO
     *Caso de Uso: CU
     *RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener IndicadorPagina dado su id",
     *   output = "IndicadorPagina",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/indicadorpagina/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id del IndicadorPagina
     *
     * @return array
     *
     * @throws NotFoundHttpException No existe ninguna entrada en IndicadorPagina
     */
    public function getIndicadorPaginaAction($id)
    {
        return $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código*** 
     *Módulo: MODULO
     *Caso de Uso: CU
     *RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   description = "Adicionar IndicadorPagina",
     *   input = "SIGE\ModelGeneratorBundle\Entity\IndicadorPagina",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/indicadorpagina")
     * @param Request $request El objeto Request de la petición
     * @return FormTypeInterface|View
     */
    public function postIndicadorPaginaAction(Request $request) {
       return $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código*** 
     *Módulo: MODULO
     *Caso de Uso: CU
     *RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\ModelGeneratorBundle\Entity\IndicadorPagina",
     *   statusCodes = {
     *  201 = "Es retornado cuando IndicadorPagina es creado",
     *  204 = "Es retornado si no existen errores",
     *  400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Put("/indicadorpagina/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de IndicadorPagina
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en IndicadorPagina
     */
    public function putIndicadorPaginaAction(Request $request, $id) {
      $view=$this->container->get('sige.class.handler')->get($id,$this->entityClass, $this->formType);
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
     *Módulo: MODULO
     *Caso de Uso: CU
     *RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\ModelGeneratorBundle\Entity\IndicadorPagina",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Patch("/indicadorpagina/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de IndicadorPagina
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en IndicadorPagina
     */
    public function patchIndicadorPaginaAction(Request $request, $id) {
       return $this->container->get('sige.class.handler')->patch($this->get($id), $request->request->all(), $this->entityClass, $this->formType);
    }

    /**
      * ***Trazabilidad del Código*** 
     *Módulo: MODULO
     *Caso de Uso: CU
     *RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\ModelGeneratorBundle\Entity\IndicadorPagina",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/indicadorpagina/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de IndicadorPagina
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de IndicadorPagina
     */
    public function deleteIndicadorPaginaAction(Request $request, $id) {
     return $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
    }

 /**
     * ***Trazabilidad del Código*** 
     *Módulo: MODULO
     *Caso de Uso: CU
     *RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\ModelGeneratorBundle\Entity\IndicadorPagina",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/indicadorpagina")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de IndicadorPagina
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de IndicadorPagina
     */
    public function deleteIndicadorPaginasAction(Request $request) {
    $params=$request->request->all();
    foreach($params as $id){
    $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
        }
    }




}
