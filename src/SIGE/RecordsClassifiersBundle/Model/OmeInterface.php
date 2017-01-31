<?php
/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\RecordsClassifiersBundle\Model;



use SIGE\SigeBundle\HandlerRest\ClassInterface;




Interface OmeInterface extends ClassInterface {

public function setId($id);
public function getId();
public function setNombredescriptivo($nombredescriptivo);
public function getNombredescriptivo();
public function setLongitud($longitud);
public function getLongitud();
public function setLatitud($latitud);
public function getLatitud();
public function setCodote(\SIGE\RecordsClassifiersBundle\Entity\Ote $codote = null);
public function getCodote();
public function addCentrosinformante(\SIGE\RecordsClassifiersBundle\Entity\Centroinformante $centrosinformantes);
public function removeCentrosinformante(\SIGE\RecordsClassifiersBundle\Entity\Centroinformante $centrosinformantes);
public function getCentrosinformantes();
}