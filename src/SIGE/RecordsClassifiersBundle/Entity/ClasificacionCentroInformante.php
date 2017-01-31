<?php

namespace SIGE\RecordsClassifiersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClasificacionCentroInformante
 *
 * @ORM\Table(name="mod_sige.tbclasificacion_centroinformante")
 * @ORM\Entity(repositoryClass="SIGE\RecordsClassifiersBundle\Repository\ClasificacionCentroInformanteRepository")
 */
class ClasificacionCentroInformante {

    /**
     * @var string
     *  
     * @ORM\Column(name="fecha", type="string")
     * @ORM\Id
     */
    private $fecha;

    /**
     * @ORM\ManyToOne(targetEntity="Clasificacion", inversedBy="centros_informantes")
     * @ORM\JoinColumn(name="idclasificacion", referencedColumnName="id")
     * @ORM\Id
     *
     */
    private $clasificacion;

    /**
     * @ORM\ManyToOne(targetEntity="Centroinformante", inversedBy="clasificaciones")
     * @ORM\JoinColumn(name="idcodcentroinformante", referencedColumnName="id")
     * @ORM\Id  
     *
     */
    private $centroinformante;

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return ClasificacionCentroInformante
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
     * Set clasificacion
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Clasificacion $clasificacion
     *
     * @return ClasificacionCentroInformante
     */
    public function setClasificacion(\SIGE\RecordsClassifiersBundle\Entity\Clasificacion $clasificacion = null) {
        $this->clasificacion = $clasificacion;

        return $this;
    }

    /**
     * Get clasificacion
     *
     * @return \SIGE\RecordsClassifiersBundle\Entity\Clasificacion
     */
    public function getClasificacion() {
        return $this->clasificacion;
    }

    /**
     * Set centroinformante
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Clasificacion $centroinformante
     *
     * @return ClasificacionCentroInformante
     */
    public function setCentroinformante(\SIGE\RecordsClassifiersBundle\Entity\Clasificacion $centroinformante = null) {
        $this->centroinformante = $centroinformante;

        return $this;
    }

    /**
     * Get centroinformante
     *
     * @return \SIGE\RecordsClassifiersBundle\Entity\Clasificacion
     */
    public function getCentroinformante() {
        return $this->centroinformante;
    }

}
