<?php
/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\SecurityManagerBundle\Model;



use SIGE\SigeBundle\HandlerRest\ClassInterface;




Interface RolInterface extends ClassInterface {

public function setId($id);
public function getId();
public function setNombredescriptivo($nombredescriptivo);
public function getNombredescriptivo();
public function setDescription($description);
public function getDescription();
public function addUser(\SIGE\SecurityManagerBundle\Entity\Usuario $users);
public function removeUser(\SIGE\SecurityManagerBundle\Entity\Usuario $users);
public function getUsers();
public function addModule(\SIGE\SecurityManagerBundle\Entity\RolModule $modules);
public function removeModule(\SIGE\SecurityManagerBundle\Entity\RolModule $modules);
public function getModules();
public function getAcotaciones();
public function addAcotacione(\SIGE\ModelGeneratorBundle\Entity\Acotacionesalmodelo $acotaciones);
public function removeAcotacione(\SIGE\ModelGeneratorBundle\Entity\Acotacionesalmodelo $acotaciones);
public function addRolCentrosInformante(\SIGE\ModelGeneratorBundle\Entity\RolCentroInformante $rolCentrosInformantes);
public function removeRolCentrosInformante(\SIGE\ModelGeneratorBundle\Entity\RolCentroInformante $rolCentrosInformantes);
public function getRolCentrosInformantes();
public function addRolClasificadore(\SIGE\ModelGeneratorBundle\Entity\Rolclasificador $rolClasificadores);
public function removeRolClasificadore(\SIGE\ModelGeneratorBundle\Entity\Rolclasificador $rolClasificadores);
public function getRolClasificadores();
public function addRolDescriptore(\SIGE\ModelGeneratorBundle\Entity\Roldescriptor $rolDescriptores);
public function removeRolDescriptore(\SIGE\ModelGeneratorBundle\Entity\Roldescriptor $rolDescriptores);
public function getRolDescriptores();
}