<?php

namespace SIGE\DataEntryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Encuesta
 *
 * @ORM\Table(name="mod_sige.tbencuesta")
 * @ORM\Entity(repositoryClass="SIGE\DataEntryBundle\Repository\EncuestaRepository")
 */
class Encuesta
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;


    /**
     * @var string
     * @ORM\Column(name="idnummodelo", type="string", length=8)
     * @ORM\Id
     */
    private $idnummodelo;

    /**
     * @var string
     * @ORM\Column(name="idsubnummodelo", type="string", length=2)
     * @ORM\Id
     */
    private $idsubnummodelo;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\RecordsClassifiersBundle\Entity\Centroinformante")
     * @ORM\JoinColumn(name="codcentroinformante", referencedColumnName="id")
     */
    private $centroinformante;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadeconfeccion", type="date")
     */
    private $fechadeconfeccion;

    /**
     * @var string
     *
     * @ORM\Column(name="valoridentidad", type="string", length=255)
     */
    private $valoridentidad;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=255)
     */
    private $observaciones;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\SigeBundle\Entity\Estado", inversedBy="encuestas")
     * @ORM\JoinColumn(name="idestado", referencedColumnName="id")
     */
    private $estado;


    /**
     * Set id
     *
     * @param integer $id
     * @return Encuesta
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idnummodelo
     *
     * @param string $idnummodelo
     * @return Encuesta
     */
    public function setIdnummodelo($idnummodelo)
    {
        $this->idnummodelo = $idnummodelo;

        return $this;
    }

    /**
     * Get idnummodelo
     *
     * @return string
     */
    public function getIdnummodelo()
    {
        return $this->idnummodelo;
    }

    /**
     * Set idsubnummodelo
     *
     * @param string $idsubnummodelo
     * @return Encuesta
     */
    public function setIdsubnummodelo($idsubnummodelo)
    {
        $this->idsubnummodelo = $idsubnummodelo;

        return $this;
    }

    /**
     * Get idsubnummodelo
     *
     * @return string
     */
    public function getIdsubnummodelo()
    {
        return $this->idsubnummodelo;
    }

    /**
     * Set fechadeconfeccion
     *
     * @param \DateTime $fechadeconfeccion
     * @return Encuesta
     */
    public function setFechadeconfeccion($fechadeconfeccion)
    {
        $this->fechadeconfeccion = $fechadeconfeccion;

        return $this;
    }

    /**
     * Get fechadeconfeccion
     *
     * @return \DateTime
     */
    public function getFechadeconfeccion()
    {
        return $this->fechadeconfeccion;
    }

    /**
     * Set valoridentidad
     *
     * @param string $valoridentidad
     * @return Encuesta
     */
    public function setValoridentidad($valoridentidad)
    {
        $this->valoridentidad = $valoridentidad;

        return $this;
    }

    /**
     * Get valoridentidad
     *
     * @return string
     */
    public function getValoridentidad()
    {
        return $this->valoridentidad;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Encuesta
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set centroinformante
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Centroinformante $centroinformante
     * @return Encuesta
     */
    public function setCentroinformante(\SIGE\RecordsClassifiersBundle\Entity\Centroinformante $centroinformante = null)
    {
        $this->centroinformante = $centroinformante;

        return $this;
    }

    /**
     * Get centroinformante
     *
     * @return \SIGE\RecordsClassifiersBundle\Entity\Centroinformante
     */
    public function getCentroinformante()
    {
        return $this->centroinformante;
    }

    /**
     * Set estado
     *
     * @param \SIGE\SigeBundle\Entity\Estado $estado
     * @return Encuesta
     */
    public function setEstado(\SIGE\SigeBundle\Entity\Estado $estado = null)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return \SIGE\SigeBundle\Entity\Estado
     */
    public function getEstado()
    {
        return $this->estado;
    }
}
