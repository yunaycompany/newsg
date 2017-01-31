<?php
/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\RecordsClassifiersBundle\Model;



use SIGE\SigeBundle\HandlerRest\ClassInterface;




Interface TematicaInterface extends ClassInterface {

public function setId($id);
public function getId();
public function setNombredescriptivo($nombredescriptivo);
public function getNombredescriptivo();
public function setIndicadores($indicadores);
public function getIndicadores();
public function setAspectos($aspectos);
public function getAspectos();
public function addIndicadore(\SIGE\RecordsClassifiersBundle\Entity\Indicador $indicadore);
public function removeIndicadore(\SIGE\RecordsClassifiersBundle\Entity\Indicador $indicadore);
public function addAspecto(\SIGE\RecordsClassifiersBundle\Entity\Aspecto $aspecto);
public function removeAspecto(\SIGE\RecordsClassifiersBundle\Entity\Aspecto $aspecto);
public function setDescripcion($descripcion);
public function getDescripcion();
}