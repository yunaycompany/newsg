<?php

namespace SIGE\RecordsClassifiersBundle\Entity;

use SIGE\RecordsClassifiersBundle\Model\OteInterface;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Exclude;

/**
 * Ote
 *
 * @ORM\Table(name="mod_sige.tbote")
 * @ORM\Entity(repositoryClass="SIGE\RecordsClassifiersBundle\Repository\OteRepository")
 */
class Ote implements OteInterface {

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
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;

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
     * @var string
     *
     * @ORM\Column(name="municipio", type="string", length=255)
     */
    private $municipio;

    /**
     * @var string
     *
     * @ORM\Column(name="provincia", type="string", length=255)
     */
    private $provincia;

    /**
     * @ORM\OneToMany(targetEntity="Ome", mappedBy="codote")
     */
    private $omes;
    
    /**
     * @ORM\OneToMany(targetEntity="SIGE\RecordsClassifiersBundle\Entity\Centroinformante", mappedBy="codote")
     * @Exclude
     */
    private $centrosinformantes;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion")
     * @ORM\JoinColumn(name="idsistemadeinformacion", referencedColumnName="id")
     * @Exclude
     */
    private $sistemadeinformacion;

       /**
     * Constructor
     */
    public function __construct()
    {
        $this->omes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->centrosinformantes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Ote
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
     * @return Ote
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
     * Set direccion
     *
     * @param string $direccion
     * @return Ote
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set longitud
     *
     * @param string $longitud
     * @return Ote
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
     * @return Ote
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
     * Add omes
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Ome $omes
     * @return Ote
     */
    public function addOme(\SIGE\RecordsClassifiersBundle\Entity\Ome $omes)
    {
        $this->omes[] = $omes;

        return $this;
    }

    /**
     * Remove omes
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Ome $omes
     */
    public function removeOme(\SIGE\RecordsClassifiersBundle\Entity\Ome $omes)
    {
        $this->omes->removeElement($omes);
    }

    /**
     * Get omes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOmes()
    {
        return $this->omes;
    }

    /**
     * Add centrosinformantes
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Centroinformante $centrosinformantes
     * @return Ote
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

    /**
     * Set sistemadeinformacion
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemadeinformacion
     * @return Ote
     */
    public function setSistemadeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemadeinformacion = null)
    {
        $this->sistemadeinformacion = $sistemadeinformacion;

        return $this;
    }

    /**
     * Get sistemadeinformacion
     *
     * @return \SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion 
     */
    public function getSistemadeinformacion()
    {
        return $this->sistemadeinformacion;
    }

    /**
     * Set municipio
     *
     * @param string $municipio
     * @return Ote
     */
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return string 
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Set provincia
     *
     * @param string $provincia
     * @return Ote
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get provincia
     *
     * @return string 
     */
    public function getProvincia()
    {
        return $this->provincia;
    }
}
