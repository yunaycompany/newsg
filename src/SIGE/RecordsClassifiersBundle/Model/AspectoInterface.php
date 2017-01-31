<?php
/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\RecordsClassifiersBundle\Model;



use SIGE\SigeBundle\HandlerRest\ClassInterface;




Interface AspectoInterface extends ClassInterface {

public function setId($id);
public function getId();
public function setNombredescriptivo($nombredescriptivo);
public function getNombredescriptivo();
public function setNotametodologica($notametodologica);
public function getNotametodologica();
public function setTematica($tematica);
public function getTematica();
public function addChild(\SIGE\RecordsClassifiersBundle\Entity\Aspecto $child);
public function removeChild(\SIGE\RecordsClassifiersBundle\Entity\Aspecto $child);
public function getChildren();
public function setAliassuperior(\SIGE\RecordsClassifiersBundle\Entity\Aspecto $aliassuperior = null);
public function getAliassuperior();
public function setSistemadeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemadeinformacion = null);
public function addSistemasdeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemasdeinformacion);
public function getSistemasdeinformacion();
public function removeSistemasdeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemasdeinformacion);
public function addPaginaaspecto(\SIGE\ModelGeneratorBundle\Entity\PaginaAspecto $paginaaspectos);
public function removePaginaaspecto(\SIGE\ModelGeneratorBundle\Entity\PaginaAspecto $paginaaspectos);
public function getPaginaaspectos();
}