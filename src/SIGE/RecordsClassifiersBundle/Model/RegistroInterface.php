<?php
/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\RecordsClassifiersBundle\Model;



use SIGE\SigeBundle\HandlerRest\ClassInterface;




Interface RegistroInterface extends ClassInterface {

public function setId($id);
public function getId();
public function setNombredescriptivo($nombredescriptivo);
public function getNombredescriptivo();
public function setAlias($alias);
public function getAlias();
public function addSistemasdeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemasdeinformacion);
public function removeSistemasdeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemasdeinformacion);
public function getSistemasdeinformacion();
public function addCentrosinformante(\SIGE\RecordsClassifiersBundle\Entity\Centroinformante $centrosinformantes);
public function removeCentrosinformante(\SIGE\RecordsClassifiersBundle\Entity\Centroinformante $centrosinformantes);
public function getCentrosinformantes();
public function addClasificadore(\SIGE\RecordsClassifiersBundle\Entity\Clasificador $clasificadores);
public function removeClasificadore(\SIGE\RecordsClassifiersBundle\Entity\Clasificador $clasificadores);
public function getClasificadores();
public function addMaestro(\SIGE\ToolsBundle\Entity\Maestroregistro $maestros);
public function removeMaestro(\SIGE\ToolsBundle\Entity\Maestroregistro $maestros);
public function getMaestros();
}