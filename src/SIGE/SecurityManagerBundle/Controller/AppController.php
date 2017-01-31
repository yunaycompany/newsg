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
use FOS\RestBundle\Controller\Annotations;
use JMS\Serializer\SerializationContext;
use Symfony\Component\Form\FormTypeInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use SIGE\SigeBundle\HandlerRest\HttpCode;

class AppController extends FOSRestController {

    private $entityClass = 'SIGE\SecurityManagerBundle\Entity\App';
    private $formType = 'SIGE\SecurityManagerBundle\Form\AppType';

    /**
     * Listar los permisos a las App, Módulos y Acciones
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar App",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/app")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="10", description="Cantidad de páginas que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     *
     * @return View
     */
    public function getAppsAction(Request $request, ParamFetcherInterface $paramFetcher) {
        try {
            $per_data = [];
            $user = $this->getUser();
            $permisos = $user->getPermisos();

            $per_data["auth"] = $this->getAccessAuth($permisos);            

            $allApps = $this->container->get('sige.class.handler')->all($this->entityClass, $this->formType);
            $allApps=$allApps->getData();

            $alowApps = array();

            if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN') && !$this->get('security.authorization_checker')->isGranted('ROLE_SUPERADMIN')) {                
                $rolesUser = $user->getRoles();
                foreach ($allApps as $key => $app) {
                    $allowModulos = new \Doctrine\Common\Collections\ArrayCollection();
                    $modules = $app->getModulos();
                    foreach ($modules as $module) {
                        $tienePermiso = false;
                        foreach ($rolesUser as $rol) {
                            if ($module->containsRol($rol)) {
                                $tienePermiso = true;
                                break;
                            }
                        }
                        if ($tienePermiso) {
                            $allowModulos[] = $module;
                        }
                    }
                    if (count($allowModulos) > 0) {
                        $allApps[$key]->setModulos($allowModulos);
                        $alowApps[] = $allApps[$key];
                    }
                }
                $jsonData = $this->container->get('jms_serializer')->serialize($alowApps, "json");
            } else {
                $per_data["auth"] =$this->getAccessAuthRoleAdmin();
                $jsonData = $this->container->get('jms_serializer')->serialize($allApps, "json");
            }

            $response = new Response("{'success': true, 'data':" . $jsonData . ",'keys':" . json_encode($per_data) . "}", HttpCode::HTTP_OK);
            return $response;
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('App get error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Obtener App dado su id
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener App dado su id",
     *   output = "App",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/app/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id del App
     *
     * @return array
     *
     * @throws NotFoundHttpException No existe ninguna entrada en App
     */
    public function getAppAction($id) {
        try {
            return $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('App get error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Adicionar App.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Adicionar App",
     *   input = "SIGE\SecurityManagerBundle\Entity\App",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/app")
     * @param Request $request El objeto Request de la petición
     * @return FormTypeInterface|View
     */
    public function postAppAction(Request $request) {
        try {
            return $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('App post error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Si no existe el id de App la Adiciona, si existe la Modifica
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\App",
     *   statusCodes = {
     *  201 = "Es retornado cuando App es creado",
     *  204 = "Es retornado si no existen errores",
     *  400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Put("/app/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de App
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en App
     */
    public function putAppAction(Request $request, $id) {
        try {
            $view = $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
            if (!$view->getData()) {
                return $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
            } else {
                return $this->container->get('sige.class.handler')->put($view, $request->request->all(), $this->entityClass, $this->formType);
            }
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('App put error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Actualiza o Crea App en un lugar específico
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\App",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Patch("/app/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de App
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en App
     */
    public function patchAppAction(Request $request, $id) {
        try {
            return $this->container->get('sige.class.handler')->patch($this->get($id), $request->request->all(), $this->entityClass, $this->formType);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('App put error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Eliminar App dado un id
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\App",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/app/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de App
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de App
     */
    public function deleteAppAction(Request $request, $id) {
        try {
            return $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('App delete error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    //Utiles 
    /**
     * Devuelve los permisos del usuario logueado
     *  @ApiDoc(  
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\Permiso"
     *      
     * )  
     */
    private function getAccessAuth($permit) {
        $auth = array();
        foreach ($permit as $p) {
            $nomen = $p->getNomenclador();
            $nameNomen = $nomen->getNombreNomenclador();
            $action = $p->getAccion()->getAccion();
            $auth[] = $nameNomen . "_" . $action;
        }
        return $auth;
    }

    //Utiles 
    /**
     * Devuelve los permisos del rol Admin
     *  @ApiDoc(  
     *   resource = true
     *      
     * )  
     */
    private function getAccessAuthRoleAdmin() {
        $entityClass = 'SIGE\SecurityManagerBundle\Entity\NomencladorSeguridad';
        $allNomenData = $this->container->get('sige.class.handler')->all($entityClass, "",false)->getData();
        $entityClass = 'SIGE\SecurityManagerBundle\Entity\Accion';
        $allActionsData = $this->container->get('sige.class.handler')->all($entityClass, "",false)->getData();
        $auth = array();
        foreach ($allNomenData as $nomen) {
            $nameNomen = $nomen->getNombreNomenclador();            
            if (count($allActionsData) > 0) {                
                foreach ($allActionsData as $action) {
                    $auth[] = $nameNomen . "_" . $action->getAccion();
                }
            }
        }
        return $auth;
    }

}
