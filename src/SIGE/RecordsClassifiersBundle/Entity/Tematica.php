<?php

namespace SIGE\RecordsClassifiersBundle\Entity;

use SIGE\RecordsClassifiersBundle\Model\TematicaInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tematica
 *
 * @ORM\Table(name="mod_sige.tbtematica")
 * @ORM\Entity(repositoryClass="SIGE\RecordsClassifiersBundle\Repository\TematicaRepository")
 */
class Tematica implements TematicaInterface {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id

     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombredescriptivo", type="string", length=255)
     */
    private $nombredescriptivo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="Indicador", mappedBy="tematica")
     */
    private $indicadores;

    /**
     * @ORM\OneToMany(targetEntity="Aspecto", mappedBy="tematica")
     */
    private $aspectos;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoindicadoraspecto", type="string", length=1)
     */
    private $tipoindicadoraspecto;

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Tematica
     */
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nombredescriptivo
     *
     * @param string $nombredescriptivo
     *
     * @return Tematica
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
     * Set indicadores
     *
     * @param string $indicadores
     *
     * @return Tematica
     */
    public function setIndicadores($indicadores) {
        $this->indicadores = $indicadores;

        return $this;
    }

    /**
     * Get indicadores
     *
     * @return string
     */
    public function getIndicadores() {
        return $this->indicadores;
    }

    /**
     * Set aspectos
     *
     * @param string $aspectos
     *
     * @return Tematica
     */
    public function setAspectos($aspectos) {
        $this->aspectos = $aspectos;

        return $this;
    }

    /**
     * Get aspectos
     *
     * @return string
     */
    public function getAspectos() {
        return $this->aspectos;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->indicadores = new \Doctrine\Common\Collections\ArrayCollection();
        $this->aspectos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add indicadore
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Indicador $indicadore
     *
     * @return Tematica
     */
    public function addIndicadore(\SIGE\RecordsClassifiersBundle\Entity\Indicador $indicadore) {
        $this->indicadores[] = $indicadore;

        return $this;
    }

    /**
     * Remove indicadore
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Indicador $indicadore
     */
    public function removeIndicadore(\SIGE\RecordsClassifiersBundle\Entity\Indicador $indicadore) {
        $this->indicadores->removeElement($indicadore);
    }

    /**
     * Add aspecto
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Aspecto $aspecto
     *
     * @return Tematica
     */
    public function addAspecto(\SIGE\RecordsClassifiersBundle\Entity\Aspecto $aspecto) {
        $this->aspectos[] = $aspecto;

        return $this;
    }

    /**
     * Remove aspecto
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Aspecto $aspecto
     */
    public function removeAspecto(\SIGE\RecordsClassifiersBundle\Entity\Aspecto $aspecto) {
        $this->aspectos->removeElement($aspecto);
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Tematica
     */
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion() {
        return $this->descripcion;
    }

    /**
     * Set tipoindicadoraspecto
     *
     * @param string $tipoindicadoraspecto
     * @return Tematica
     */
    public function setTipoindicadoraspecto($tipoindicadoraspecto) {
        $this->tipoindicadoraspecto = $tipoindicadoraspecto;

        return $this;
    }

    /**
     * Get tipoindicadoraspecto
     *
     * @return string 
     */
    public function getTipoindicadoraspecto() {
        return $this->tipoindicadoraspecto;
    }

}
