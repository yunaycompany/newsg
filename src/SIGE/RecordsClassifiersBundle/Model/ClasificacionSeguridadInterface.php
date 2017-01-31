<?php

/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\RecordsClassifiersBundle\Model;

use SIGE\SigeBundle\HandlerRest\ClassInterface;

Interface ClasificacionSeguridadInterface extends ClassInterface {

    public function setId($id);

    public function getId();

    public function setNombredescriptivo($nombredescriptivo);

    public function getNombredescriptivo();

    public function setDescripcion($descripcion);

    public function getDescripcion();
}
