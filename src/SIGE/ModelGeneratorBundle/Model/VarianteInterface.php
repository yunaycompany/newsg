<?php
/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\ModelGeneratorBundle\Model;



use SIGE\SigeBundle\HandlerRest\ClassInterface;




Interface VarianteInterface extends ClassInterface {

public function setId($id);
public function getId();
public function setIdnummodelo($idnummodelo);
public function setIdsubnummodelo($idsubnummodelo);
public function setVariante($variante);
public function setVariantesup($variantesup);
public function setNombredescriptivo($nombredescriptivo);
public function getNombredescriptivo();
public function setNotametodologica($notametodologica);
public function getNotametodologica();
public function setDescriptor(\SIGE\ModelGeneratorBundle\Entity\Descriptor $descriptor = null);
public function getDescriptor();
public function addChild(\SIGE\ModelGeneratorBundle\Entity\Variante $children);
public function removeChild(\SIGE\ModelGeneratorBundle\Entity\Variante $children);
public function getChildren();
public function setCodvariantesup(\SIGE\ModelGeneratorBundle\Entity\Variante $codvariantesup = null);
public function getCodvariantesup();
}