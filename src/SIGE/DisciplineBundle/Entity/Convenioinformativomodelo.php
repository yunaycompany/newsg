<?php

namespace SIGE\DisciplineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Convenioinformativomodelo
 *
 * @ORM\Table(name="mod_sige.tbconvenioinformativomodelo")
 * @ORM\Entity(repositoryClass="SIGE\DisciplineBundle\Repository\ConvenioinformativomodeloRepository")
 */
class Convenioinformativomodelo {

    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\DataEntryBundle\Entity\Modelo")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="idnummodelo", referencedColumnName="idnummodelo"),
     *      @ORM\JoinColumn(name="idsubnummodelo", referencedColumnName="idsubnummodelo"),
     *      @ORM\JoinColumn(name="idcodvariante", referencedColumnName="idcodvariante"),
     *      @ORM\JoinColumn(name="idfechadelinformeacumulado", referencedColumnName="fechadelinformeacumulado"),
     *      @ORM\JoinColumn(name="idcodcentroinformante", referencedColumnName="codcentroinformante")
     * })
     */
    private $mmodelo;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\DisciplineBundle\Entity\Convenioinformativo")
     *   @ORM\JoinColumn(name="idconvenio", referencedColumnName="id")
     */
    private $idconvenio;

    /**
     * @var int
     *  @ORM\Column(name="idcodindicador", type="integer")
     */
    private $idcodindicador;

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
     * @return Convenioinformativomodelo
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
     * Set idcodindicador
     *
     * @param integer $idcodindicador
     * @return Convenioinformativomodelo
     */
    public function setIdcodindicador($idcodindicador) {
        $this->idcodindicador = $idcodindicador;

        return $this;
    }

    /**
     * Get idcodindicador
     *
     * @return integer 
     */
    public function getIdcodindicador() {
        return $this->idcodindicador;
    }

    /**
     * Set mmodelo
     *
     * @param \SIGE\DataEntryBundle\Entity\Modelo $mmodelo
     * @return Convenioinformativomodelo
     */
    public function setMmodelo(\SIGE\DataEntryBundle\Entity\Modelo $mmodelo = null) {
        $this->mmodelo = $mmodelo;

        return $this;
    }

    /**
     * Get mmodelo
     *
     * @return \SIGE\DataEntryBundle\Entity\Modelo 
     */
    public function getMmodelo() {
        return $this->mmodelo;
    }

    /**
     * Set idconvenio
     *
     * @param \SIGE\DisciplineBundle\Entity\Convenioinformativo $idconvenio
     * @return Convenioinformativomodelo
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

}
