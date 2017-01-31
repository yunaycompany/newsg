<?php

namespace SIGE\RecordsClassifiersBundle\Entity;


use SIGE\RecordsClassifiersBundle\Model\IndicadorInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Indicador
 *
 * @ORM\Table(name="mod_sige.tbindicador")
 * @ORM\Entity(repositoryClass="SIGE\RecordsClassifiersBundle\Repository\IndicadorRepository")
 */
class Indicador implements IndicadorInterface {

    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="ClasificacionSeguridad")
     * @ORM\JoinColumn(name="idclasificaciondeseguridad", referencedColumnName="id")
     */
    private $clasificaciondeseguridad;

    /**
     * @ORM\ManyToOne(targetEntity="TipoIndicador")
     * @ORM\JoinColumn(name="idtipodeindicador", referencedColumnName="id")
     */
    private $tipodeindicador;

    /**
     * @ORM\ManyToOne(targetEntity="Tematica")
     * @ORM\JoinColumn(name="idcodtematica", referencedColumnName="id")
     */
    private $tematica;

    /**
     * @var string
     *
     * @ORM\Column(name="nombredescriptivo", type="string", length=255)
     */
    private $nombredescriptivo;

    /**
     * @var string
     *
     * @ORM\Column(name="unidaddemedida", type="string", length=255)
     */
    private $unidaddemedida;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\SigeBundle\Entity\Periodicidad")
     * @ORM\JoinColumn(name="idperiodicidad", referencedColumnName="id")
     */
    private $periodicidad;

    /**
     * @var string
     *
     * @ORM\Column(name="notametodologica", type="text")
     */
    private $notametodologica;

    /**
     * @var bool
     *
     * @ORM\Column(name="essumable", type="boolean", nullable=true)
     */
    private $essumable;

    /**
     * @ORM\ManyToMany(targetEntity="Sistemadeinformacion", mappedBy="indicadores")
     */
    private $sistemasdeinformacion;
    
    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Indicador
     */
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set clasificaciondeseguridad
     *
     * @param string $clasificaciondeseguridad
     *
     * @return Indicador
     */
    public function setClasificaciondeseguridad($clasificaciondeseguridad) {
        $this->clasificaciondeseguridad = $clasificaciondeseguridad;

        return $this;
    }

    /**
     * Get clasificaciondeseguridad
     *
     * @return string
     */
    public function getClasificaciondeseguridad() {
        return $this->clasificaciondeseguridad;
    }

    /**
     * Set tipodeindicador
     *
     * @param string $tipodeindicador
     *
     * @return Indicador
     */
    public function setTipodeindicador($tipodeindicador) {
        $this->tipodeindicador = $tipodeindicador;

        return $this;
    }

    /**
     * Get tipodeindicador
     *
     * @return string
     */
    public function getTipodeindicador() {
        return $this->tipodeindicador;
    }

    /**
     * Set tematica
     *
     * @param string $tematica
     *
     * @return Indicador
     */
    public function setTematica($tematica) {
        $this->tematica = $tematica;

        return $this;
    }

    /**
     * Get tematica
     *
     * @return string
     */
    public function getTematica() {
        return $this->tematica;
    }

    /**
     * Set nombredescriptivo
     *
     * @param string $nombredescriptivo
     *
     * @return Indicador
     */
    public function setNombredescriptivo($nombredescriptivo) {
        $this->nombredescriptivo = $nombredescriptivo;

        return $this;
    }

    /**
     * Get nombredescriptivo
     *
     * @return string
     */
    public function getNombredescriptivo() {
        return $this->nombredescriptivo;
    }

    /**
     * Set unidaddemedida
     *
     * @param string $unidaddemedida
     *
     * @return Indicador
     */
    public function setUnidaddemedida($unidaddemedida) {
        $this->unidaddemedida = $unidaddemedida;

        return $this;
    }

    /**
     * Get unidaddemedida
     *
     * @return string
     */
    public function getUnidaddemedida() {
        return $this->unidaddemedida;
    }

    /**
     * Set periodicidad
     *
     * @param string $periodicidad
     *
     * @return Indicador
     */
    public function setPeriodicidad($periodicidad) {
        $this->periodicidad = $periodicidad;

        return $this;
    }

    /**
     * Get periodicidad
     *
     * @return string
     */
    public function getPeriodicidad() {
        return $this->periodicidad;
    }

    /**
     * Set notametodologica
     *
     * @param string $notametodologica
     *
     * @return Indicador
     */
    public function setNotametodologica($notametodologica) {
        $this->notametodologica = $notametodologica;

        return $this;
    }

    /**
     * Get notametodologica
     *
     * @return string
     */
    public function getNotametodologica() {
        return $this->notametodologica;
    }

    /**
     * Set essumable
     *
     * @param boolean $essumable
     *
     * @return Indicador
     */
    public function setEssumable($essumable) {
        $this->essumable = $essumable;

        return $this;
    }

    /**
     * Get essumable
     *
     * @return boolean
     */
    public function getEssumable() {
        return $this->essumable;
    }

    /**
     * Set sistemadeinformacion
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemadeinformacion
     *
     * @return Indicador
     */
    public function setSistemadeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemadeinformacion = null) {
        $this->sistemadeinformacion = $sistemadeinformacion;

        return $this;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sistemasdeinformacion = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add sistemasdeinformacion
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemasdeinformacion
     * @return Indicador
     */
    public function addSistemasdeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemasdeinformacion)
    {
        $this->sistemasdeinformacion[] = $sistemasdeinformacion;

        return $this;
    }

    /**
     * Remove sistemasdeinformacion
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemasdeinformacion
     */
    public function removeSistemasdeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemasdeinformacion)
    {
        $this->sistemasdeinformacion->removeElement($sistemasdeinformacion);
    }

    /**
     * Get sistemasdeinformacion
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSistemasdeinformacion()
    {
        return $this->sistemasdeinformacion;
    }
}
