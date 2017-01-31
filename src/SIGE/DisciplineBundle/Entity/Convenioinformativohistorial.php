<?php

namespace SIGE\DisciplineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Convenioinformativohistorial
 *
 * @ORM\Table(name="mod_sige.tbconvenioinformativohistorial")
 * @ORM\Entity(repositoryClass="SIGE\DisciplineBundle\Repository\ConvenioinformativohistorialRepository")
 */
class Convenioinformativohistorial
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\ModelGeneratorBundle\Entity\Descriptor")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="idnummodelo", referencedColumnName="idnummodelo"),
     *      @ORM\JoinColumn(name="idsubnummodelo", referencedColumnName="idsubnummodelo")
     * })
     */
    private $descriptor;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\RecordsClassifiersBundle\Entity\Centroinformante")
     * @ORM\JoinColumn(name="idcentroinformante", referencedColumnName="id")
     */

    private $idcentroinformante;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\SigeBundle\Entity\Estado")
     * @ORM\JoinColumn(name="idestado", referencedColumnName="id")
     */

    private $idestado;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\DisciplineBundle\Entity\Convenioinformativo")
     * @ORM\JoinColumn(name="idconvenio", referencedColumnName="id")
     */
    private $idconvenio;

    /**
     * @var \DateTime
     * @ORM\Column(name="fechacumplimientoo", type="integer")
     */

    private $fechacumplimiento;

    
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
     * @return Convenioinformativohistorial
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fechacumplimiento
     *
     * @param integer $fechacumplimiento
     * @return Convenioinformativohistorial
     */
    public function setFechacumplimiento($fechacumplimiento)
    {
        $this->fechacumplimiento = $fechacumplimiento;

        return $this;
    }

    /**
     * Get fechacumplimiento
     *
     * @return integer 
     */
    public function getFechacumplimiento()
    {
        return $this->fechacumplimiento;
    }

    /**
     * Set descriptor
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Descriptor $descriptor
     * @return Convenioinformativohistorial
     */
    public function setDescriptor(\SIGE\ModelGeneratorBundle\Entity\Descriptor $descriptor = null)
    {
        $this->descriptor = $descriptor;

        return $this;
    }

    /**
     * Get descriptor
     *
     * @return \SIGE\ModelGeneratorBundle\Entity\Descriptor 
     */
    public function getDescriptor()
    {
        return $this->descriptor;
    }

    /**
     * Set idcentroinformante
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Centroinformante $idcentroinformante
     * @return Convenioinformativohistorial
     */
    public function setIdcentroinformante(\SIGE\RecordsClassifiersBundle\Entity\Centroinformante $idcentroinformante = null)
    {
        $this->idcentroinformante = $idcentroinformante;

        return $this;
    }

    /**
     * Get idcentroinformante
     *
     * @return \SIGE\RecordsClassifiersBundle\Entity\Centroinformante 
     */
    public function getIdcentroinformante()
    {
        return $this->idcentroinformante;
    }

    /**
     * Set idestado
     *
     * @param \SIGE\SigeBundle\Entity\Estado $idestado
     * @return Convenioinformativohistorial
     */
    public function setIdestado(\SIGE\SigeBundle\Entity\Estado $idestado = null)
    {
        $this->idestado = $idestado;

        return $this;
    }

    /**
     * Get idestado
     *
     * @return \SIGE\SigeBundle\Entity\Estado 
     */
    public function getIdestado()
    {
        return $this->idestado;
    }

    /**
     * Set idconvenio
     *
     * @param \SIGE\DisciplineBundle\Entity\Convenioinformativo $idconvenio
     * @return Convenioinformativohistorial
     */
    public function setIdconvenio(\SIGE\DisciplineBundle\Entity\Convenioinformativo $idconvenio = null)
    {
        $this->idconvenio = $idconvenio;

        return $this;
    }

    /**
     * Get idconvenio
     *
     * @return \SIGE\DisciplineBundle\Entity\Convenioinformativo 
     */
    public function getIdconvenio()
    {
        return $this->idconvenio;
    }
}
