<?php
/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\SecurityManagerBundle\Model;



use SIGE\SigeBundle\HandlerRest\ClassInterface;




Interface AuthTypeInterface extends ClassInterface {

public function setId($id);
public function getId();
public function setAuthtype($authtype);
public function getAuthtype();
public function addUsuario(\SIGE\SecurityManagerBundle\Entity\Usuario $user);
public function removeUsuario(\SIGE\SecurityManagerBundle\Entity\Usuario $user);
public function getUsuarios();
}