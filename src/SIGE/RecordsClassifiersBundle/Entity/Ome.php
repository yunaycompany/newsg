<?php

namespace SIGE\RecordsClassifiersBundle\Entity;

use SIGE\RecordsClassifiersBundle\Model\OmeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Ome
 *
 * @ORM\Table(name="mod_sige.tbome")
 * @ORM\Entity(repositoryClass="SIGE\RecordsClassifiersBundle\Repository\OmeRepository")
 */
class Ome implements OmeInterface {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Ote", inversedBy="omes")
     * @ORM\JoinColumn(name="idcodote", referencedColumnName="id")
     */
    private $codote;

    /**
     * @var string
     *
     * @ORM\Column(name="nombredescriptivo", type="string", length=255)
     */
    private $nombredescriptivo;

    /**
     * @var string
     *
     * @ORM\Column(name="longitud", type="string", length=255)
     */
    private $longitud;

    /**
     * @var string
     *
     * @ORM\Column(name="latitud", type="string", length=255)
     */
    private $latitud;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\RecordsClassifiersBundle\Entity\Centroinformante", mappedBy="codome")
     */
    private $centrosinformantes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->centrosinformantes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Ome
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
     * Set nombredescriptivo
     *
     * @param string $nombredescriptivo
     * @return Ome
     */
    public function setNombredescriptivo($nombredescriptivo)
    {
        $this->nombredescriptivo = $nombredescriptivo;

        return $this;
    }

    /**
     * Get nombredescriptivo
     *
     * @return string 
     */
    public function getNombredescriptivo()
    {
        return $this->nombredescriptivo;
    }

    /**
     * Set longitud
     *
     * @param string $longitud
     * @return Ome
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get longitud
     *
     * @return string 
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Set latitud
     *
     * @param string $latitud
     * @return Ome
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get latitud
     *
     * @return string 
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set codote
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Ote $codote
     * @return Ome
     */
    public function setCodote(\SIGE\RecordsClassifiersBundle\Entity\Ote $codote = null)
    {
        $this->codote = $codote;

        return $this;
    }

    /**
     * Get codote
     *
     * @return \SIGE\RecordsClassifiersBundle\Entity\Ote 
     */
    public function getCodote()
    {
        return $this->codote;
    }

    /**
     * Add centrosinformantes
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Centroinformante $centrosinformantes
     * @return Ome
     */
    public function addCentrosinformante(\SIGE\RecordsClassifiersBundle\Entity\Centroinformante $centrosinformantes)
    {
        $this->centrosinformantes[] = $centrosinformantes;

        return $this;
    }

    /**
     * Remove centrosinformantes
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Centroinformante $centrosinformantes
     */
    public function removeCentrosinformante(\SIGE\RecordsClassifiersBundle\Entity\Centroinformante $centrosinformantes)
    {
        $this->centrosinformantes->removeElement($centrosinformantes);
    }

    /**
     * Get centrosinformantes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCentrosinformantes()
    {
        return $this->centrosinformantes;
    }
}
