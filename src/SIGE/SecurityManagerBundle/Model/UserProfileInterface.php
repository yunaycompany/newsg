<?php
/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\SecurityManagerBundle\Model;



use SIGE\SigeBundle\HandlerRest\ClassInterface;




Interface UserProfileInterface extends ClassInterface {

public function setId($id);
public function getId();
public function setFailedLogin($failedLogin);
public function getFailedLogin();
public function setPasswordModifyAt($passwordModifyAt);
public function getPasswordModifyAt();
public function setChangePasswordRequired($changePasswordRequired);
public function getChangePasswordRequired();
public function setLastIp($lastIp);
public function getLastIp();
public function setUser(\SIGE\SecurityManagerBundle\Entity\Usuario $user = null);
public function getUser();
}