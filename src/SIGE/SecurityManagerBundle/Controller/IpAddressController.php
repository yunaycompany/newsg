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



class IpAddressController extends FOSRestController
{

    private $entityClass =  'SIGE\SecurityManagerBundle\Entity\IpAddress';
    private $formType = 'SIGE\SecurityManagerBundle\Form\IpAddressType';



    /**
     * Listar IpAddress
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar IpAddress",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/ipaddress")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="15", description="Cantidad de resultados que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     *
     * @return View
     */
    public function getIpAddresssAction(Request $request, ParamFetcherInterface $paramFetcher)
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
     * Obtener IpAddress dado su id
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener IpAddress dado su id",
     *   output = "IpAddress",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/ipaddress/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id del IpAddress
     *
     * @return array
     *
     * @throws NotFoundHttpException No existe ninguna entrada en IpAddress
     */
    public function getIpAddressAction($id)
    {
        return $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
    }

    /**
     * Adicionar IpAddress.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Adicionar IpAddress",
     *   input = "SIGE\SecurityManagerBundle\Entity\IpAddress",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/ipaddress")
     * @param Request $request El objeto Request de la petición
     * @return FormTypeInterface|View
     */
    public function postIpAddressAction(Request $request) {
       return $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
    }

    /**
     * Si no existe el id de IpAddress Adiciona, si existe Modifica
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\IpAddress",
     *   statusCodes = {
     *  201 = "Es retornado cuando IpAddress es creado",
     *  204 = "Es retornado si no existen errores",
     *  400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Put("/ipaddress/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de IpAddress
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en IpAddress
     */
    public function putIpAddressAction(Request $request, $id) {
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
     * Actualiza o Crea IpAddress en un lugar específico
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\IpAddress",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Patch("/ipaddress/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de IpAddress
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en IpAddress
     */
    public function patchIpAddressAction(Request $request, $id) {
       return $this->container->get('sige.class.handler')->patch($this->get($id), $request->request->all(), $this->entityClass, $this->formType);
    }

    /**
     * Eliminar IpAddress dado un id
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\IpAddress",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/ipaddress/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de IpAddress
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de IpAddress
     */
    public function deleteIpAddressAction(Request $request, $id) {
     return $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
    }

 /**
     * Eliminar IpAddress dado varios id
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\IpAddress",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/ipaddress")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de IpAddress
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de IpAddress
     */
    public function deleteIpAddresssAction(Request $request) {
    $params=$request->request->all();
    foreach($params as $id){
    $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
        }
    }




}
