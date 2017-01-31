<?php
/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\RecordsClassifiersBundle\Model;



use SIGE\SigeBundle\HandlerRest\ClassInterface;




Interface ClasificadorInterface extends ClassInterface {

public function setId($id);
public function getId();
public function setAlias($alias);
public function getAlias();
public function setNombredescriptivo($nombredescriptivo);
public function getNombredescriptivo();
public function setConfiguracion($configuracion);
public function getConfiguracion();
public function setDominio(\SIGE\RecordsClassifiersBundle\Entity\DominioClasificador $dominio = null);
public function getDominio();
public function addClasificacione(\SIGE\RecordsClassifiersBundle\Entity\Clasificacion $clasificaciones);
public function removeClasificacione(\SIGE\RecordsClassifiersBundle\Entity\Clasificacion $clasificaciones);
public function getClasificaciones();
public function addRegistro(\SIGE\RecordsClassifiersBundle\Entity\Registro $registros);
public function removeRegistro(\SIGE\RecordsClassifiersBundle\Entity\Registro $registros);
public function getRegistros();
public function addChild(\SIGE\RecordsClassifiersBundle\Entity\Clasificador $children);
public function removeChild(\SIGE\RecordsClassifiersBundle\Entity\Clasificador $children);
public function getChildren();
public function setCodclasificadorsup(\SIGE\RecordsClassifiersBundle\Entity\Clasificador $codclasificadorsup = null);
public function getCodclasificadorsup();
public function addPregunta(\SIGE\ModelGeneratorBundle\Entity\Pregunta $preguntas);
public function removePregunta(\SIGE\ModelGeneratorBundle\Entity\Pregunta $preguntas);
public function getPreguntas();
}
