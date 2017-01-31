<?php

namespace SIGE\ModelGeneratorBundle\Entity;

use SIGE\ModelGeneratorBundle\Model\VarianteInterface;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Exclude;

/**
 * Variante
 *
 * @ORM\Table(name="mod_sige.tbvariante")
 * @ORM\Entity(repositoryClass="SIGE\ModelGeneratorBundle\Repository\VarianteRepository")
 */
class Variante implements VarianteInterface {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Descriptor")
     * @ORM\JoinColumns({
     *     @ORM\JoinColumn(name="idnummodelo", referencedColumnName="idnummodelo"),
     *     @ORM\JoinColumn(name="idsubnummodelo", referencedColumnName="idsubnummodelo")
     * })
     * @Exclude
     */
    private $descriptor;

    /**
     * @ORM\OneToMany(targetEntity="Variante", mappedBy="codvariantesup")
     */
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="Variante", inversedBy="children")
     * @ORM\JoinColumn(name="codvariantesup", referencedColumnName="id")
     */
    private $codvariantesup;

    /**
     * @var string
     *
     * @ORM\Column(name="nombredescriptivo", type="string", length=255)
     */
    private $nombredescriptivo;

    /**
     * @var string
     *
     * @ORM\Column(name="notametodologica", type="string", length=255)
     */
    private $notametodologica;

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Variante
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
     * Set idnummodelo
     *
     * @param string $idnummodelo
     * @return Variante
     */
    public function setIdnummodelo($idnummodelo) {
        $this->idnummodelo = $idnummodelo;

        return $this;
    }

    /**
     * Set idsubnummodelo
     *
     * @param string $idsubnummodelo
     * @return Variante
     */
    public function setIdsubnummodelo($idsubnummodelo) {
        $this->idsubnummodelo = $idsubnummodelo;

        return $this;
    }

    /**
     * Set variante
     *
     * @param integer $variante
     * @return Variante
     */
    public function setVariante($variante) {
        $this->variante = $variante;

        return $this;
    }

    /**
     * Set variantesup
     *
     * @param integer $variantesup
     * @return Variante
     */
    public function setVariantesup($variantesup) {
        $this->variantesup = $variantesup;

        return $this;
    }

    /**
     * Set nombredescriptivo
     *
     * @param string $nombredescriptivo
     * @return Variante
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
     * Set notametodologica
     *
     * @param string $notametodologica
     * @return Variante
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
     * Constructor
     */
    public function __construct() {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set descriptor
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Descriptor $descriptor
     * @return Variante
     */
    public function setDescriptor(\SIGE\ModelGeneratorBundle\Entity\Descriptor $descriptor = null) {
        $this->descriptor = $descriptor;

        return $this;
    }

    /**
     * Get descriptor
     *
     * @return \SIGE\ModelGeneratorBundle\Entity\Descriptor 
     */
    public function getDescriptor() {
        return $this->descriptor;
    }

    /**
     * Add children
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Variante $children
     * @return Variante
     */
    public function addChild(\SIGE\ModelGeneratorBundle\Entity\Variante $children) {
        $this->children[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Variante $children
     */
    public function removeChild(\SIGE\ModelGeneratorBundle\Entity\Variante $children) {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren() {
        return $this->children;
    }

    /**
     * Set codvariantesup
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Variante $codvariantesup
     * @return Variante
     */
    public function setCodvariantesup(\SIGE\ModelGeneratorBundle\Entity\Variante $codvariantesup = null) {
        $this->codvariantesup = $codvariantesup;

        return $this;
    }

    /**
     * Get codvariantesup
     *
     * @return \SIGE\ModelGeneratorBundle\Entity\Variante 
     */
    public function getCodvariantesup() {
        return $this->codvariantesup;
    }

}
