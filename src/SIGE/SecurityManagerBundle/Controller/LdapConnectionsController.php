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

class LdapConnectionsController extends FOSRestController {

    private $entityClass = 'SIGE\SecurityManagerBundle\Entity\LdapConnections';
    private $formType = 'SIGE\SecurityManagerBundle\Form\LdapConnectionsType';

    /**
     * Listar LdapConnections
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar LdapConnections",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/ldapconnections")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="15", description="Cantidad de resultados que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     *
     * @return View
     */
    public function getLdapConnectionssAction(Request $request, ParamFetcherInterface $paramFetcher) {
        try {
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
            $jsonData = $this->container->get('jms_serializer')->serialize($data, "json");

            $response = new Response("{'success': true, 'data':" . $jsonData . ",'length':" . $length . "}", "200");


            return $response;
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('Ldap get error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Obtener LdapConnections dado su id
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener LdapConnections dado su id",
     *   output = "LdapConnections",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/ldapconnections/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id del LdapConnections
     *
     * @return array
     *
     * @throws NotFoundHttpException No existe ninguna entrada en LdapConnections
     */
    public function getLdapConnectionsAction($id) {
        try {
            return $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('Ldap get error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Adicionar LdapConnections.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Adicionar LdapConnections",
     *   input = "SIGE\SecurityManagerBundle\Entity\LdapConnections",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/ldapconnections")
     * @param Request $request El objeto Request de la petición
     * @return FormTypeInterface|View
     */
    public function postLdapConnectionsAction(Request $request) {
        try {
            $respuesta = $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
            if ($respuesta["success"]) {
                $respuesta["message"] = $this->get('translator')->trans('Ldap add');
            }

            return new Response(json_encode($respuesta), $respuesta["code"]);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('Ldap post error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Si no existe el id de LdapConnections Adiciona, si existe Modifica
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\LdapConnections",
     *   statusCodes = {
     *  201 = "Es retornado cuando LdapConnections es creado",
     *  204 = "Es retornado si no existen errores",
     *  400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Put("/ldapconnections/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de LdapConnections
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en LdapConnections
     */
    public function putLdapConnectionsAction(Request $request, $id) {
        try {
            $view = $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
            if (!$view->getData()) {
                $respuesta = $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
                if ($respuesta["success"]) {
                    $respuesta["message"] = $this->get('translator')->trans('Ldap modified');
                }
            } else {
                $respuesta = $this->container->get('sige.class.handler')->put($view->getData(), $request->request->all(), $this->entityClass, $this->formType);
                if ($respuesta["success"]) {
                    $respuesta["message"] = $this->get('translator')->trans('Ldap modified');
                }
            }
            return new Response(json_encode($respuesta), $respuesta["code"]);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('Ldap put error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Actualiza o Crea LdapConnections en un lugar específico
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\LdapConnections",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Patch("/ldapconnections/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de LdapConnections
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en LdapConnections
     */
    public function patchLdapConnectionsAction(Request $request, $id) {
        try {
            return $this->container->get('sige.class.handler')->patch($this->get($id), $request->request->all(), $this->entityClass, $this->formType);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('Ldap patch error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Eliminar LdapConnections dado un id
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\LdapConnections",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/ldapconnections/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de LdapConnections
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de LdapConnections
     */
    public function deleteLdapConnectionsAction(Request $request, $id) {
        try {
            $respuesta = $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
            if ($respuesta["success"]) {
                $respuesta["message"] = $this->get('translator')->trans('Ldap eliminated');
            }
            return new Response(json_encode($respuesta), $respuesta["code"]);
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('Ldap delete error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Eliminar LdapConnections dado varios id
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\SecurityManagerBundle\Entity\LdapConnections",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/ldapconnections")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de LdapConnections
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de LdapConnections
     */
    public function deleteLdapConnectionssAction(Request $request) {
        try {
            $params = $request->request->all();
            foreach ($params as $id) {
                $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
            }
        } catch (Exception $ex) {
            $response = new Response("{'success': false, 'message':" . $this->get('translator')->trans('Ldap delete error') . "}", HttpCode::HTTP_OK);
            return $response;
        }
    }

    /**
     * Obtiene los datos del Usuario desde LDAP
     *
     * @ApiDoc(
     *   resource = true,
     *   input ="user_id and LDAP_id",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/ldapconnections/usuario")
     * @param Request $request El objeto Request de la petición
     *
     * @return Data
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Entidad
     */
    public function getDatafromLDAP(Request $request) {
        try {
            $id_ldap = $request->request->get("id_ldap");
            $username = $request->request->get("username");
            $ldap = $this->container->get('sige.class.handler')->get($id_ldap, $this->entityClass, $this->formType);
            $data = $ldap->getData();
            if ($data) {
                $host = is_array($data) ? $data["host"] : $data->getHost();
                $port = is_array($data) ? $data["port"] : $data->getPort();
                $account = is_array($data) ? $data["account"] : $data->getAccount();
                $password = is_array($data) ? $data["password"] : $data->getPassword();
                $name = is_array($data) ? $data["name"] : $data->getName();
                $surName = is_array($data) ? $data["surname"] : $data->getSurName();
                $email = is_array($data) ? $data["email"] : $data->getEmail();
            }
            $ldapconn = ldap_connect($host, $port);
            ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
            ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
            $ldapbind = ldap_bind($ldapconn, $account, $password);
            if ($ldapbind == 1) {
                $dn = $ldap->getData()->getBaseDN();
                $filter = $ldap->getData()->getUserName() . '=' . $username;
                $justthese = array($name, $surName, $email);
                $sr = ldap_search($ldapconn, $dn, $filter, $justthese, 0, 1);
                $info = ldap_get_entries($ldapconn, $sr);
                $ldapUserArray = array(
                    "email" => utf8_encode($info[0][strtolower($email)][0]),
                    "name" => utf8_encode($info[0][strtolower($name)][0]),
                    "surname" => utf8_encode($info[0][strtolower($surName)][0]),
                    "dn" => $info[0]["dn"]
                );
                return new Response("{'success': true, 'data':" . json_encode($ldapUserArray) . ",'length':1}", "200");
            }
        } catch (\Exception $e) {
            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Ldap User Fail'))), '200');
        }
    }

}
