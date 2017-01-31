<?php

/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 11:05
 */

namespace SIGE\SigeBundle\HandlerRest;

use FOS\RestBundle\View\View;
use \FOS\RestBundle\Request\ParamFetcherInterface;

interface ClassHandlerInterface {

    /**
     * Obtener la Entidad dado un id
     *
     * @api
     *
     * @param mixed $id
     * @param $entityClass
     * @param $formType
     * @return View
     */
    public function get($id, $entityClass, $formType);

    /**
     * Obtener una lista de la Entidad
     *
     * @param ParamFetcherInterface $paramFetcher
     * @param $entityClass
     * @param $formType
     * @return View
     */
    public function all($entityClass, $formType);

    /**
     *  Obtener una lista de la Entidad por Rango
     *
     * @param ParamFetcherInterface $paramFetcher
     * @param $entityClass
     * @param $formType
     *
     * @return View
     */
    public function allRange($paramFetcher, $entityClass, $formType);

    /**
     * Adicionar una entrada en la Entidad
     *
     * @api
     *
     * @param array $parameters
     * @param $entityClass
     * @param $formType
     * @return View
     */
    public function post(array $parameters, $entityClass, $formType);

    /**
     * Editar la Entidad
     *
     * @api
     *
     * @param ClassInterface   $class
     * @param array           $parameters
     * @param $entityClass
     * @param $formType
     * @return View
     */
    public function put($class, array $parameters, $entityClass, $formType);

    /**
     * Actualizar la Entidad parcialmente
     *
     * @api
     *
     * @param ClassInterface   $class
     * @param array           $parameters
     * @param $entityClass
     * @param $formType
     * @return View
     */
    public function patch($class, array $parameters, $entityClass, $formType);

    /**
     * Eliminar una entrada de la Entidad dado un id
     *
     * @api
     *
     * @param int   $id
     * @param $entityClass
     * @param $formType
     * @return View
     */
    public function delete($id, $entityClass, $formType);
}
