<?php

namespace SIGE\RecordsClassifiersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CentroinformanteEstado
 *
 * @ORM\Table(name="mod_sige.tbcentroinformante_estado")
 * @ORM\Entity(repositoryClass="SIGE\RecordsClassifiersBundle\Repository\CentroinformanteEstadoRepository")
 */
class CentroinformanteEstado {

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\SigeBundle\Entity\Estado")
     * @ORM\JoinColumn(name="idestado", referencedColumnName="id")
     * @ORM\Id
     */
    private $estado;

    /**
     * @ORM\ManyToOne(targetEntity="Centroinformante", inversedBy="centroinformante")
     * @ORM\JoinColumn(name="idcodcentroinformante", referencedColumnName="id")
     * @ORM\Id
     */
    private $centroinformante;
    
    /**
     * Set id
     *
     * @param integer $id
     *
     * @return CentroinformanteEstado
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return CentroinformanteEstado
     */
    public function setFecha($fecha) {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha() {
        return $this->fecha;
    }

    /**
     * Set estado
     *
     * @param \SIGE\SigeBundle\Entity\Estado $estado
     * @return CentroinformanteEstado
     */
    public function setEstado(\SIGE\SigeBundle\Entity\Estado $estado) {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return \SIGE\SigeBundle\Entity\Estado 
     */
    public function getEstado() {
        return $this->estado;
    }

    /**
     * Set centroinformante
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Centroinformante $centroinformante
     * @return CentroinformanteEstado
     */
    public function setCentroinformante(\SIGE\RecordsClassifiersBundle\Entity\Centroinformante $centroinformante) {
        $this->centroinformante = $centroinformante;

        return $this;
    }

    /**
     * Get centroinformante
     *
     * @return \SIGE\RecordsClassifiersBundle\Entity\Centroinformante 
     */
    public function getCentroinformante() {
        return $this->centroinformante;
    }

}
