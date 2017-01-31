<?php
/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\SecurityManagerBundle\Model;



use SIGE\SigeBundle\HandlerRest\ClassInterface;




Interface LdapConnectionsInterface extends ClassInterface {

public function setId($id);
public function getId();
public function setLdapname($ldapname);
public function getLdapname();
public function setHost($host);
public function getHost();
public function setPort($port);
public function getPort();
public function setAccount($account);
public function getAccount();
public function setPassword($password);
public function getPassword();
public function setBasedn($basedn);
public function getBasedn();
public function setUsername($username);
public function getUsername();
public function setName($name);
public function getName();
public function setSurname($surname);
public function getSurname();
public function setEmail($email);
public function getEmail();
}