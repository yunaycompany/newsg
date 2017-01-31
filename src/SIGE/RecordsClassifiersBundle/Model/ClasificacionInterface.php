<?php
/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\RecordsClassifiersBundle\Model;



use SIGE\SigeBundle\HandlerRest\ClassInterface;




Interface ClasificacionInterface extends ClassInterface {

public function setId($id);
public function getId();
public function setNombredescriptivo($nombredescriptivo);
public function getNombredescriptivo();
public function setAlias($alias);
public function getAlias();
public function setClasificador(\SIGE\RecordsClassifiersBundle\Entity\Clasificador $clasificador);
public function getClasificador();
public function addCentrosInformante(\SIGE\RecordsClassifiersBundle\Entity\ClasificacionCentroInformante $centrosInformante);
public function removeCentrosInformante(\SIGE\RecordsClassifiersBundle\Entity\ClasificacionCentroInformante $centrosInformante);
public function getCentrosInformantes();
}