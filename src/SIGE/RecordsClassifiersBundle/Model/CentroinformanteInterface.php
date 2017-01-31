<?php
/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\RecordsClassifiersBundle\Model;



use SIGE\SigeBundle\HandlerRest\ClassInterface;




Interface CentroinformanteInterface extends ClassInterface {

public function setId($id);
public function getId();
public function setNombredescriptivo($nombredescriptivo);
public function getNombredescriptivo();
public function setDireccion($direccion);
public function getDireccion();
public function setFechadecreacion($fechadecreacion);
public function getFechadecreacion();
public function setDetalles($detalles);
public function getDetalles();
public function setCorreo($correo);
public function getCorreo();
public function setTelefono($telefono);
public function getTelefono();
public function setEstado(\SIGE\SigeBundle\Entity\Estado $estado = null);
public function getEstado();
public function setSistemadeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemadeinformacion = null);
public function getSistemadeinformacion();
public function setRegistro(\SIGE\RecordsClassifiersBundle\Entity\Registro $registro = null);
public function getRegistro();
public function setCodome(\SIGE\RecordsClassifiersBundle\Entity\Ome $codome = null);
public function getCodome();
public function addClasificacione(\SIGE\RecordsClassifiersBundle\Entity\ClasificacionCentroInformante $clasificacione);
public function removeClasificacione(\SIGE\RecordsClassifiersBundle\Entity\ClasificacionCentroInformante $clasificacione);
public function getClasificaciones();
public function addHistorialEstado(\SIGE\RecordsClassifiersBundle\Entity\CentroinformanteEstado $historialEstados);
public function removeHistorialEstado(\SIGE\RecordsClassifiersBundle\Entity\CentroinformanteEstado $historialEstados);
public function getHistorialEstados();
public function setLongitud($longitud);
public function getLongitud();
public function setLatitud($latitud);
public function getLatitud();
public function setCodote(\SIGE\RecordsClassifiersBundle\Entity\Ote $codote = null);
public function getCodote();
public function addEncuesta(\SIGE\DataEntryBundle\Entity\Encuesta $encuestas);
public function removeEncuesta(\SIGE\DataEntryBundle\Entity\Encuesta $encuestas);
public function getEncuestas();
public function addRole(\SIGE\ModelGeneratorBundle\Entity\RolCentroInformante $roles);
public function removeRole(\SIGE\ModelGeneratorBundle\Entity\RolCentroInformante $roles);
public function getRoles();
}