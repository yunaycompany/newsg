<?php

namespace SIGE\RecordsClassifiersBundle\Entity;

use SIGE\RecordsClassifiersBundle\Model\RegistroInterface;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\MaxDepth;

/**
 * Registro
 *
 * @ORM\Table(name="mod_sige.tbregistro")
 * @ORM\Entity(repositoryClass="SIGE\RecordsClassifiersBundle\Repository\RegistroRepository")
 */
class Registro implements RegistroInterface {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @Expose
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombredescriptivo", type="string", length=255)
     * @Expose
     */
    private $nombredescriptivo;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=255)
     * @Expose
     */
    private $alias;

    /**
     * @ORM\ManyToMany(targetEntity="Sistemadeinformacion", mappedBy="registros")
     * @Exclude
     */
    private $sistemasdeinformacion;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\RecordsClassifiersBundle\Entity\Centroinformante", mappedBy="registro")
     * @Exclude
     */
    private $centrosinformantes;

    /**
     * @ORM\ManyToMany(targetEntity="Clasificador", inversedBy="registros")
     * @ORM\JoinTable(name="mod_sige.tbregistroclasificador")
     * ///@Exclude
     */
    private $clasificadores;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\ToolsBundle\Entity\Maestroregistro", mappedBy="registro")
     * @Exclude
     */
    private $maestros;

    /**
     * Constructor
     */
    public function __construct() {
        $this->centrosinformantes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->clasificadores = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Registro
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
     * Set nombredescriptivo
     *
     * @param string $nombredescriptivo
     *
     * @return Registro
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
     * Set alias
     *
     * @param string $alias
     *
     * @return Registro
     */
    public function setAlias($alias) {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias() {
        return $this->alias;
    }

    /**
     * Add sistemasdeinformacion
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemasdeinformacion
     * @return Registro
     */
    public function addSistemasdeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemasdeinformacion) {
        $this->sistemasdeinformacion[] = $sistemasdeinformacion;

        return $this;
    }

    /**
     * Remove sistemasdeinformacion
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemasdeinformacion
     */
    public function removeSistemasdeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemasdeinformacion) {
        $this->sistemasdeinformacion->removeElement($sistemasdeinformacion);
    }

    /**
     * Get sistemasdeinformacion
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSistemasdeinformacion() {
        return $this->sistemasdeinformacion;
    }

    /**
     * Add centrosinformantes
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Centroinformante $centrosinformantes
     * @return Registro
     */
    public function addCentrosinformante(\SIGE\RecordsClassifiersBundle\Entity\Centroinformante $centrosinformantes) {
        $this->centrosinformantes[] = $centrosinformantes;

        return $this;
    }

    /**
     * Remove centrosinformantes
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Centroinformante $centrosinformantes
     */
    public function removeCentrosinformante(\SIGE\RecordsClassifiersBundle\Entity\Centroinformante $centrosinformantes) {
        $this->centrosinformantes->removeElement($centrosinformantes);
    }

    /**
     * Get centrosinformantes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCentrosinformantes() {
        return $this->centrosinformantes;
    }

    /**
     * Add clasificadores
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Clasificador $clasificadores
     * @return Registro
     */
    public function addClasificadore(\SIGE\RecordsClassifiersBundle\Entity\Clasificador $clasificadores) {
        $this->clasificadores[] = $clasificadores;

        return $this;
    }

    /**
     * Remove clasificadores
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Clasificador $clasificadores
     */
    public function removeClasificadore(\SIGE\RecordsClassifiersBundle\Entity\Clasificador $clasificadores) {
        $this->clasificadores->removeElement($clasificadores);
    }

    /**
     * Get clasificadores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClasificadores() {
        return $this->clasificadores;
    }


    /**
     * Add maestros
     *
     * @param \SIGE\ToolsBundle\Entity\Maestroregistro $maestros
     * @return Registro
     */
    public function addMaestro(\SIGE\ToolsBundle\Entity\Maestroregistro $maestros)
    {
        $this->maestros[] = $maestros;

        return $this;
    }

    /**
     * Remove maestros
     *
     * @param \SIGE\ToolsBundle\Entity\Maestroregistro $maestros
     */
    public function removeMaestro(\SIGE\ToolsBundle\Entity\Maestroregistro $maestros)
    {
        $this->maestros->removeElement($maestros);
    }

    /**
     * Get maestros
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMaestros()
    {
        return $this->maestros;
    }
}
