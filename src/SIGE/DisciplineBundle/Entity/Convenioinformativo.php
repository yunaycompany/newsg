<?php

namespace SIGE\DisciplineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Convenioinformativo
 *
 * @ORM\Table(name="mod_sige.tbconvenioinformativo")
 * @ORM\Entity(repositoryClass="SIGE\DisciplineBundle\Repository\ConvenioinformativoRepository")
 */
class Convenioinformativo {

    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion")
     * @ORM\JoinColumn(name="idsistemadeinformacion", referencedColumnName="id")
     */
    private $sistemadeinformacion;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\SigeBundle\Entity\Periodicidad")
     * @ORM\JoinColumn(name="idperiodicidad", referencedColumnName="id")
     */
    private $periodicidad;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\RecordsClassifiersBundle\Entity\Centroinformante")
     * @ORM\JoinColumn(name="idcodcentroinformante", referencedColumnName="id")
     */
    private $codcentroinformante;

    /**
     * Constructor
     */
    public function __construct() {
        
    }
    
    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Convenioinformativo
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
     * Set sistemadeinformacion
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemadeinformacion
     * @return Convenioinformativo
     */
    public function setSistemadeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemadeinformacion = null) {
        $this->sistemadeinformacion = $sistemadeinformacion;

        return $this;
    }

    /**
     * Get sistemadeinformacion
     *
     * @return \SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion 
     */
    public function getSistemadeinformacion() {
        return $this->sistemadeinformacion;
    }

    /**
     * Set periodicidad
     *
     * @param \SIGE\SigeBundle\Entity\Periodicidad $periodicidad
     * @return Convenioinformativo
     */
    public function setPeriodicidad(\SIGE\SigeBundle\Entity\Periodicidad $periodicidad = null) {
        $this->periodicidad = $periodicidad;

        return $this;
    }

    /**
     * Get periodicidad
     *
     * @return \SIGE\SigeBundle\Entity\Periodicidad 
     */
    public function getPeriodicidad() {
        return $this->periodicidad;
    }

    /**
     * Set codcentroinformante
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Centroinformante $codcentroinformante
     * @return Convenioinformativo
     */
    public function setCodcentroinformante(\SIGE\RecordsClassifiersBundle\Entity\Centroinformante $codcentroinformante = null) {
        $this->codcentroinformante = $codcentroinformante;

        return $this;
    }

    /**
     * Get codcentroinformante
     *
     * @return \SIGE\RecordsClassifiersBundle\Entity\Centroinformante 
     */
    public function getCodcentroinformante() {
        return $this->codcentroinformante;
    }

}
