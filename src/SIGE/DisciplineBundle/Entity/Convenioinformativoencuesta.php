<?php

namespace SIGE\DisciplineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Convenioinformativoencuesta
 *
 * @ORM\Table(name="mod_sige.tbconvenioinformativoencuesta")
 * @ORM\Entity(repositoryClass="SIGE\DisciplineBundle\Repository\ConvenioinformativoencuestaRepository")
 */
class Convenioinformativoencuesta {

    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\DisciplineBundle\Entity\Convenioinformativo")
     *   @ORM\JoinColumn(name="idconvenio", referencedColumnName="id")
     */
    private $idconvenio;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\DataEntryBundle\Entity\Encuesta")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="idencuesta", referencedColumnName="id"),
     *      @ORM\JoinColumn(name="idnummodelo", referencedColumnName="idnummodelo"),
     *      @ORM\JoinColumn(name="idsubnummodelo", referencedColumnName="idsubnummodelo")
     * })
     */
    private $encuestas;

    /**
     * @var int
     *  @ORM\Column(name="idpregunta", type="integer")
     */
    private $idpregunta;

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
     * @return Convenioinformativoencuesta
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
     * Set idpregunta
     *
     * @param integer $idpregunta
     * @return Convenioinformativoencuesta
     */
    public function setIdpregunta($idpregunta) {
        $this->idpregunta = $idpregunta;

        return $this;
    }

    /**
     * Get idpregunta
     *
     * @return integer 
     */
    public function getIdpregunta() {
        return $this->idpregunta;
    }

    /**
     * Set idconvenio
     *
     * @param \SIGE\DisciplineBundle\Entity\Convenioinformativo $idconvenio
     * @return Convenioinformativoencuesta
     */
    public function setIdconvenio(\SIGE\DisciplineBundle\Entity\Convenioinformativo $idconvenio = null) {
        $this->idconvenio = $idconvenio;

        return $this;
    }

    /**
     * Get idconvenio
     *
     * @return \SIGE\DisciplineBundle\Entity\Convenioinformativo 
     */
    public function getIdconvenio() {
        return $this->idconvenio;
    }

    /**
     * Set encuestas
     *
     * @param \SIGE\DataEntryBundle\Entity\Encuesta $encuestas
     * @return Convenioinformativoencuesta
     */
    public function setEncuestas(\SIGE\DataEntryBundle\Entity\Encuesta $encuestas = null) {
        $this->encuestas = $encuestas;

        return $this;
    }

    /**
     * Get encuestas
     *
     * @return \SIGE\DataEntryBundle\Entity\Encuesta 
     */
    public function getEncuestas() {
        return $this->encuestas;
    }

}
