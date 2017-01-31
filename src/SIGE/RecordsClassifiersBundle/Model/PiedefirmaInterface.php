<?php
/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\RecordsClassifiersBundle\Model;



use SIGE\SigeBundle\HandlerRest\ClassInterface;




Interface PiedefirmaInterface extends ClassInterface {

public function setId($id);
public function getId();
public function setDenominaciondelpie($denominaciondelpie);
public function getDenominaciondelpie();
public function setPrimercargo($primercargo);
public function getPrimercargo();
public function setSegundocargo($segundocargo);
public function getSegundocargo();
public function setNotadecertificacion($notadecertificacion);
public function getNotadecertificacion();
public function setSistemadeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemadeinformacion);
public function getSistemadeinformacion();
}