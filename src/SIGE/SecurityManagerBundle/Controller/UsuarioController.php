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
use JMS\Serializer\SerializationContext;
use FOS\RestBundle\Controller\Annotations;
use Symfony\Component\Form\FormTypeInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use \SIGE\SecurityManagerBundle\Entity\Usuario;
use Symfony\Component\HttpFoundation\Response;
use SIGE\SigeBundle\HandlerRest\HttpCode;

class UsuarioController extends FOSRestController {

    private $entityClass = 'SIGE\SecurityManagerBundle\Entity\Usuario';
    private $formType = 'SIGE\SecurityManagerBundle\Form\UsuarioType';

    /**
     * Listar Usuario
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar Usuario",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/usuario")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="5", description="Cantidad de páginas que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     *
     * @return View
     */
    public function getUsuariosAction(Request $request, ParamFetcherInterface $paramFetcher) {
        try {                
                $query = $request->query->get("query");
                $filtres = array();
                $search_type = 0; //1 es simple y 2 avanzada
                if ($query) {
                    $filtres = (array) json_decode($query);
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
                $length = 0;
                if (count($data) > 0) {
                    $allData = $this->container->get('sige.class.handler')->all($this->entityClass, $this->formType);
                    $length = count($allData->getData());
                }
                $jsonData = $this->container->get('jms_serializer')->serialize($data, "json");
                $response = new Response("{'success': true, 'data':" . $jsonData . ",'length':" . $length . "}", HttpCode::HTTP_OK);

                return $response;
         
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('User get error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Obtener Usuario dado su id
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener Usuario dado su id",
     *   output = "Usuario",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/usuario/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id del Usuario
     *
     * @return array
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Usuario
     */
    public function getUsuarioAction($id) {
        try {
             
            return $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('User get error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Adicionar Usuario.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Adicionar Usuario",
     *   input = "SIGE\SecurityManagerBundle\Entity\Usuario",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/usuario")
     * @param Request $request El objeto Request de la petición
     * @return FormTypeInterface|View
     */
    public function postUsuarioAction(Request $request) {
        try {
            
            $parameters = $request->request->all();
            $plainPassword = $parameters["password"];
            $user = new Usuario();
            $encoder = $this->container->get('security.password_encoder');
            $passEncoded = $encoder->encodePassword($user, $plainPassword);
            $parameters["password"] = $passEncoded;
            $respuesta = $this->container->get('sige.class.handler')->post($parameters, $this->entityClass, $this->formType);
            if (isset($respuesta["success"]) && $respuesta["success"]) {
                $respuesta["message"] = $this->get('translator')->trans('User add');
            }

            return new Response(json_encode($respuesta), $respuesta["code"]);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('User post error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Si no existe el id de Usuario Adiciona, si existe Modifica
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\Usuario",
     *   statusCodes = {
     *  201 = "Es retornado cuando Usuario es creado",
     *  204 = "Es retornado si no existen errores",
     *  400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Put("/usuario/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Usuario
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Usuario
     */
    public function putUsuarioAction(Request $request, $id) {
        try {
          
            $parameters = $request->request->all();
            if (isset($parameters["password"])) {
                $plainPassword = $parameters["password"];
                $user = new Usuario();
                $encoder = $this->container->get('security.password_encoder');
                $passEncoded = $encoder->encodePassword($user, $plainPassword);
                $parameters["password"] = $passEncoded;
            }
            $view = $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
            if (!$view->getData()) {
                $respuesta = $this->container->get('sige.class.handler')->post($parameters, $this->entityClass, $this->formType);
                if ($respuesta["success"]) {
                    $respuesta["message"] = $this->get('translator')->trans('User add');
                }
            } else {
                $respuesta = $this->container->get('sige.class.handler')->put($view->getData(), $parameters, $this->entityClass, $this->formType);
                if ($respuesta["success"]) {
                    $respuesta["message"] = $this->get('translator')->trans('User modified');
                }
            }
            return new Response(json_encode($respuesta), $respuesta["code"]);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('User put error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Actualiza o Crea Usuario en un lugar específico
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\Usuario",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Patch("/usuario/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Usuario
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Usuario
     */
    public function patchUsuarioAction(Request $request, $id) {
        try {             
            $respuesta = $this->container->get('sige.class.handler')->patch($this->get($id), $request->request->all(), $this->entityClass, $this->formType);
            if ($respuesta["success"]) {
                $respuesta["message"] = $this->get('translator')->trans('User modified');
            }
            return new Response(json_encode($respuesta), $respuesta["code"]);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('User patch error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Eliminar Usuario dado un id
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\Usuario",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/usuario/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Usuario
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Usuario
     */
    public function deleteUsuarioAction(Request $request, $id) {
        try {              
            $respuesta = $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
            if ($respuesta["success"]) {
                $respuesta["message"] = $this->get('translator')->trans('User eliminated');
            }
            return new Response(json_encode($respuesta), $respuesta["code"]);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('User delete error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Eliminar Usuario dado varios id
     *
     * @ApiDoc(
     *   resource = true,
     *   input ="SIGE\SecurityManagerBundle\Entity\Usuario",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/usuario")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Usuario
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Entidad
     */
    public function deleteUsuariosAction(Request $request) {
        try {             
            $params = json_decode($request->request->get('ids'));

            foreach ($params as $id) {
                $respuesta = $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
            }
            return new Response(json_encode($respuesta), $respuesta["code"]);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('User delete error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Importar Usuarios.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Importar Usuarios",
     *   input = "File excel, csv, xml",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/usuario/import")
     * @param Request $request El objeto Request de la petición
     * @return FormTypeInterface|View
     */
    public function importUsuarioAction(Request $request) {
        $fileName = $_FILES['file']['name'];
        $fileType = $_FILES['file']['type'];
        $fileContent = file_get_contents($_FILES['file']['tmp_name']);
        $dataUrl = 'data:' . $fileType . ';base64,' . base64_encode($fileContent);
        $response = new Response("{'success': true, 'message':'File " . $fileName . " upload correct'}", HttpCode::HTTP_OK);
        return $response;
    }

}
