<?php
/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\DataEntryBundle\Model;



use SIGE\SigeBundle\HandlerRest\ClassInterface;




Interface ModeloInterface extends ClassInterface {

public function setCodvariante($codvariante);
public function getCodvariante();
public function setFechadelinformeacumulado($fechadelinformeacumulado);
public function getFechadelinformeacumulado();
public function setCentroinformante($centroinformante);
public function getCentroinformante();
public function setFechadeconfeccion($fechadeconfeccion);
public function getFechadeconfeccion();
public function setObservaciones($observaciones);
public function getObservaciones();
public function setEstado($estado);
public function getEstado();
public function setDescriptor(\SIGE\ModelGeneratorBundle\Entity\Descriptor $descriptor = null);
public function setAcotaciones(\SIGE\ModelGeneratorBundle\Entity\Acotacionesalmodelo $acotaciones = null);
public function getAcotaciones();
public function setId($id);
public function setAnno($anno);
public function getAnno();
public function setMes($mes);
public function getMes();
public function setDia($dia);
public function getDia();
public function addAcotacione(\SIGE\ModelGeneratorBundle\Entity\Acotacionesalmodelo $acotaciones);
public function removeAcotacione(\SIGE\ModelGeneratorBundle\Entity\Acotacionesalmodelo $acotaciones);
public function setIdnummodelo($idnummodelo);
public function getIdnummodelo();
public function setIdsubnummodelo($idsubnummodelo);
public function getIdsubnummodelo();
public function addValidacione(\SIGE\ModelGeneratorBundle\Entity\ModeloValidacion $validaciones);
public function removeValidacione(\SIGE\ModelGeneratorBundle\Entity\ModeloValidacion $validaciones);
public function getValidaciones();
}