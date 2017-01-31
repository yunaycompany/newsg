<?php
/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\SecurityManagerBundle\Model;



use SIGE\SigeBundle\HandlerRest\ClassInterface;




Interface IpAddressInterface extends ClassInterface {

public function setId($id);
public function getId();
public function setIp($ip);
public function getIp();
public function setActive($active);
public function getActive();
public function setUser(\SIGE\SecurityManagerBundle\Entity\Usuario $user = null);
public function getUser();
public  function validateIpInsideRangeOfIp($str_ip);
}