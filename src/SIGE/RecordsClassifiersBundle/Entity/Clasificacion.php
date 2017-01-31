<?php

namespace SIGE\RecordsClassifiersBundle\Entity;

use SIGE\RecordsClassifiersBundle\Model\ClasificacionInterface;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\MaxDepth;

/**
 * Clasificacion
 *
 * @ORM\Table(name="mod_sige.tbclasificacion")
 * @ORM\Entity(repositoryClass="SIGE\RecordsClassifiersBundle\Repository\ClasificacionRepository")
 * @ExclusionPolicy("all")
 */
class Clasificacion implements ClasificacionInterface {

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", unique=true)
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
     * /@ORM\Id
     * @ORM\ManyToOne(targetEntity="Clasificador", inversedBy="clasificaciones")
     * @ORM\JoinColumn(name="idclasificador", referencedColumnName="id", onDelete="CASCADE")
     */
    private $clasificador;

    /**
     * @ORM\OneToMany(targetEntity="ClasificacionCentroInformante", mappedBy="clasificacion")
     */
    private $centros_informantes;

    /**
     * Constructor
     */
    public function __construct() {
        $this->centros_informantes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param string $id
     *
     * @return Clasificacion
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
     * @return Clasificacion
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
     * @return Clasificacion
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
     * Set clasificador
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Clasificador $clasificador
     *
     * @return Clasificacion
     */
    public function setClasificador(\SIGE\RecordsClassifiersBundle\Entity\Clasificador $clasificador) {
        $this->clasificador = $clasificador;

        return $this;
    }

    /**
     * Get clasificador
     *
     * @return \SIGE\RecordsClassifiersBundle\Entity\Clasificador
     */
    public function getClasificador() {
        return $this->clasificador;
    }

    /**
     * Add centrosInformante
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\ClasificacionCentroInformante $centrosInformante
     *
     * @return Clasificacion
     */
    public function addCentrosInformante(\SIGE\RecordsClassifiersBundle\Entity\ClasificacionCentroInformante $centrosInformante) {
        $this->centros_informantes[] = $centrosInformante;

        return $this;
    }

    /**
     * Remove centrosInformante
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\ClasificacionCentroInformante $centrosInformante
     */
    public function removeCentrosInformante(\SIGE\RecordsClassifiersBundle\Entity\ClasificacionCentroInformante $centrosInformante) {
        $this->centros_informantes->removeElement($centrosInformante);
    }

    /**
     * Get centrosInformantes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCentrosInformantes() {
        return $this->centros_informantes;
    }
    
}
