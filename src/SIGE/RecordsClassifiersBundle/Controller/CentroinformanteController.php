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



class CentroinformanteController extends FOSRestController
{

    private $entityClass =  'SIGE\RecordsClassifiersBundle\Entity\Centroinformante';
    private $formType = 'SIGE\RecordsClassifiersBundle\Form\CentroinformanteType';



    /**
     * ***Trazabilidad del Código*** 
     *Módulo: Gestión de Configuración
     *Caso de Uso: Gestionar Unidades de Observación
     *RF: # 29 - Listar Unidades de Observación
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar Unidades de Observación",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/centroinformante")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="15", description="Cantidad de resultados que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     *
     * @return View
     */
    public function getCentroinformantesAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $query = $request->query->get("query");

        $filtros = array();
        if ($query && is_array($query)) {
            $filtros = (array) json_decode($query);
            $filtros = array_filter($filtros);
        }

        $Alldata = $this->container->get('sige.class.handler')->allRange($paramFetcher, $this->entityClass, $this->formType, $filtros);
        $data = $Alldata->getData();
        //var_dump($data);die;
        $LengthData = $this->container->get('sige.class.handler')->all($this->entityClass, $this->formType, $filtros);
        $length = count($LengthData->getData());
        $jsonData = $this->container->get('jms_serializer')->serialize($data, "json");
        return new Response(json_encode(array("success" => true, "data" => json_decode($jsonData), "length" => $length, HttpCode::HTTP_OK)));

        return $response;
    }


    /**
     * ***Trazabilidad del Código*** 
     *Módulo: MODULO
     *Caso de Uso: CU
     *RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener Centroinformante dado su id",
     *   output = "Centroinformante",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/centroinformante/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id del Centroinformante
     *
     * @return array
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Centroinformante
     */
    public function getCentroinformanteAction($id)
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
     *   description = "Adicionar Centroinformante",
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Centroinformante",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/centroinformante")
     * @param Request $request El objeto Request de la petición
     * @return FormTypeInterface|View
     */
    public function postCentroinformanteAction(Request $request) {
       return $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código*** 
     *Módulo: MODULO
     *Caso de Uso: CU
     *RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Centroinformante",
     *   statusCodes = {
     *  201 = "Es retornado cuando Centroinformante es creado",
     *  204 = "Es retornado si no existen errores",
     *  400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Put("/centroinformante/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Centroinformante
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Centroinformante
     */
    public function putCentroinformanteAction(Request $request, $id) {
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
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Centroinformante",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Patch("/centroinformante/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Centroinformante
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Centroinformante
     */
    public function patchCentroinformanteAction(Request $request, $id) {
       return $this->container->get('sige.class.handler')->patch($this->get($id), $request->request->all(), $this->entityClass, $this->formType);
    }

    /**
      * ***Trazabilidad del Código*** 
     *Módulo: MODULO
     *Caso de Uso: CU
     *RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Centroinformante",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/centroinformante/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Centroinformante
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Centroinformante
     */
    public function deleteCentroinformanteAction(Request $request, $id) {
     return $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
    }

 /**
     * ***Trazabilidad del Código*** 
     *Módulo: MODULO
     *Caso de Uso: CU
     *RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Centroinformante",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/centroinformante")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Centroinformante
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Centroinformante
     */
    public function deleteCentroinformantesAction(Request $request) {
    $params=$request->request->all();
    foreach($params as $id){
    $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
        }
    }
}
