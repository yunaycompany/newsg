<?php
/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\RecordsClassifiersBundle\Model;



use SIGE\SigeBundle\HandlerRest\ClassInterface;




Interface OteInterface extends ClassInterface {

public function setId($id);
public function getId();
public function setNombredescriptivo($nombredescriptivo);
public function getNombredescriptivo();
public function setDireccion($direccion);
public function getDireccion();
public function setLongitud($longitud);
public function getLongitud();
public function setLatitud($latitud);
public function getLatitud();
public function addOme(\SIGE\RecordsClassifiersBundle\Entity\Ome $omes);
public function removeOme(\SIGE\RecordsClassifiersBundle\Entity\Ome $omes);
public function getOmes();
public function addCentrosinformante(\SIGE\RecordsClassifiersBundle\Entity\Centroinformante $centrosinformantes);
public function removeCentrosinformante(\SIGE\RecordsClassifiersBundle\Entity\Centroinformante $centrosinformantes);
public function getCentrosinformantes();
public function setSistemadeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemadeinformacion = null);
public function getSistemadeinformacion();
public function setMunicipio($municipio);
public function getMunicipio();
public function setProvincia($provincia);
public function getProvincia();
}