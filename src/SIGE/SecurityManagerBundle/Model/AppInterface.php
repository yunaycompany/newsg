<?php
/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\SecurityManagerBundle\Model;


use SIGE\SigeBundle\HandlerRest\ClassInterface;


Interface AppInterface extends ClassInterface
{
    public function setId($id);

    public function getId();

    public function setNombredescriptivo($nombredescriptivo);

    public function getNombredescriptivo();

    public function setCodename($codename);

    public function getCodename();

    public function addModulo(\SIGE\SecurityManagerBundle\Entity\Module $modulos);

    public function removeModulo(\SIGE\SecurityManagerBundle\Entity\Module $modulos);

    public function getModulos();
}