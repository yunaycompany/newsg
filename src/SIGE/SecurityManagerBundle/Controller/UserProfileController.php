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



class UserProfileController extends FOSRestController
{

    private $entityClass =  'SIGE\SecurityManagerBundle\Entity\UserProfile';
    private $formType = 'SIGE\SecurityManagerBundle\Form\UserProfileType';



    /**
     * ***Trazabilidad del Código*** 
     *Módulo: MODULO
     *Caso de Uso: CU
     *RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar UserProfile",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/userprofile")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="15", description="Cantidad de resultados que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     *
     * @return View
     */
    public function getUserProfilesAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $query = $request->query->get("query");
        $filtros = array();
        if ($query && is_array($query)) {
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
     *   description = "Obtener UserProfile dado su id",
     *   output = "UserProfile",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/userprofile/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id del UserProfile
     *
     * @return array
     *
     * @throws NotFoundHttpException No existe ninguna entrada en UserProfile
     */
    public function getUserProfileAction($id)
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
     *   description = "Adicionar UserProfile",
     *   input = "SIGE\SecurityManagerBundle\Entity\UserProfile",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/userprofile")
     * @param Request $request El objeto Request de la petición
     * @return FormTypeInterface|View
     */
    public function postUserProfileAction(Request $request) {
       return $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código*** 
     *Módulo: MODULO
     *Caso de Uso: CU
     *RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\UserProfile",
     *   statusCodes = {
     *  201 = "Es retornado cuando UserProfile es creado",
     *  204 = "Es retornado si no existen errores",
     *  400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Put("/userprofile/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de UserProfile
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en UserProfile
     */
    public function putUserProfileAction(Request $request, $id) {
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
     *   input = "SIGE\SecurityManagerBundle\Entity\UserProfile",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Patch("/userprofile/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de UserProfile
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en UserProfile
     */
    public function patchUserProfileAction(Request $request, $id) {
       return $this->container->get('sige.class.handler')->patch($this->get($id), $request->request->all(), $this->entityClass, $this->formType);
    }

    /**
      * ***Trazabilidad del Código*** 
     *Módulo: MODULO
     *Caso de Uso: CU
     *RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\UserProfile",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/userprofile/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de UserProfile
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de UserProfile
     */
    public function deleteUserProfileAction(Request $request, $id) {
     return $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
    }

 /**
     * ***Trazabilidad del Código*** 
     *Módulo: MODULO
     *Caso de Uso: CU
     *RF: # RF
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\UserProfile",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/userprofile")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de UserProfile
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de UserProfile
     */
    public function deleteUserProfilesAction(Request $request) {
    $params=$request->request->all();
    foreach($params as $id){
    $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
        }
    }




}
