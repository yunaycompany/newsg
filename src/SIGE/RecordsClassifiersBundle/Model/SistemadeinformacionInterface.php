<?php
/**
 * Created by PhpStorm.
 * User: Alex Brito de las Cuevas
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\RecordsClassifiersBundle\Model;



use SIGE\SigeBundle\HandlerRest\ClassInterface;




Interface SistemadeinformacionInterface extends ClassInterface {

public function setId($id);
public function getId();
public function setTipodearchivo($tipodearchivo);
public function getTipodearchivo();
public function addRegistro(\SIGE\RecordsClassifiersBundle\Entity\Registro $registros);
public function removeRegistro(\SIGE\RecordsClassifiersBundle\Entity\Registro $registros);
public function getRegistros();
public function setDenominacion($denominacion);
public function getDenominacion();
public function addIndicadore(\SIGE\RecordsClassifiersBundle\Entity\Indicador $indicadores);
public function getIndicadores();
public function removeIndicadore(\SIGE\RecordsClassifiersBundle\Entity\Indicador $indicadores);
public function setImagenlogo($imagenlogo);
public function getImagenlogo();
}