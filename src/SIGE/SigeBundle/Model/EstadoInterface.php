<?php
/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\SigeBundle\Model;



use SIGE\SigeBundle\HandlerRest\ClassInterface;




Interface EstadoInterface extends ClassInterface {

public function getId();
public function setNombredescriptivo($nombredescriptivo);
public function getNombredescriptivo();
}