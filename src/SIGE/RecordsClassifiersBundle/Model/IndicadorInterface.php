<?php
/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\RecordsClassifiersBundle\Model;



use SIGE\SigeBundle\HandlerRest\ClassInterface;




Interface IndicadorInterface extends ClassInterface {

public function setId($id);
public function getId();
public function setClasificaciondeseguridad($clasificaciondeseguridad);
public function getClasificaciondeseguridad();
public function setTipodeindicador($tipodeindicador);
public function getTipodeindicador();
public function setTematica($tematica);
public function getTematica();
public function setNombredescriptivo($nombredescriptivo);
public function getNombredescriptivo();
public function setUnidaddemedida($unidaddemedida);
public function getUnidaddemedida();
public function setPeriodicidad($periodicidad);
public function getPeriodicidad();
public function setNotametodologica($notametodologica);
public function getNotametodologica();
public function setEssumable($essumable);
public function getEssumable();
public function setSistemadeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemadeinformacion = null);
public function addSistemasdeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemasdeinformacion);
public function removeSistemasdeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemasdeinformacion);
public function getSistemasdeinformacion();
}