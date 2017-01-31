<?php

namespace SIGE\ModelGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cuadredevalidacion
 *
 * @ORM\Table(name="mod_sige.tbcuadredevalidacion")
 * @ORM\Entity(repositoryClass="SIGE\ModelGeneratorBundle\Repository\CuadredevalidacionRepository")
 */
class Cuadredevalidacion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="string", length=16)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id; 

    /**
     * @ORM\ManyToOne(targetEntity="Descriptor")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="idnummodelo", referencedColumnName="idnummodelo"),
     *      @ORM\JoinColumn(name="idsubnummodelo", referencedColumnName="idsubnummodelo")
     * })
     */
    private $descriptor;

    /**
     * @var string
     *
     * @ORM\Column(name="cuadre", type="string", length=255)
     */
    private $cuadre;

    /**
     * @var string
     *
     * @ORM\Column(name="codfilas", type="string", length=255)
     */
    private $codfilas;

    /**
     * @var string
     *
     * @ORM\Column(name="formulas", type="string", length=255)
     */
    private $formulas;
    
    /**
     * Set idnummodelo
     *
     * @param string $idnummodelo
     * @return Cuadredevalidacion
     */
    public function setIdnummodelo($idnummodelo)
    {
        $this->idnummodelo = $idnummodelo;

        return $this;
    }

    /**
     * Set idsubnummodelo
     *
     * @param string $idsubnummodelo
     * @return Cuadredevalidacion
     */
    public function setIdsubnummodelo($idsubnummodelo)
    {
        $this->idsubnummodelo = $idsubnummodelo;

        return $this;
    }
    

    /**
     * Set cuadre
     *
     * @param string $cuadre
     * @return Cuadredevalidacion
     */
    public function setCuadre($cuadre)
    {
        $this->cuadre = $cuadre;

        return $this;
    }

    /**
     * Get cuadre
     *
     * @return string 
     */
    public function getCuadre()
    {
        return $this->cuadre;
    }

    /**
     * Set codfilas
     *
     * @param string $codfilas
     * @return Cuadredevalidacion
     */
    public function setCodfilas($codfilas)
    {
        $this->codfilas = $codfilas;

        return $this;
    }

    /**
     * Get codfilas
     *
     * @return string 
     */
    public function getCodfilas()
    {
        return $this->codfilas;
    }

    /**
     * Set formulas
     *
     * @param string $formulas
     * @return Cuadredevalidacion
     */
    public function setFormulas($formulas)
    {
        $this->formulas = $formulas;

        return $this;
    }

    /**
     * Get formulas
     *
     * @return string 
     */
    public function getFormulas()
    {
        return $this->formulas;
    }
    
    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Cuadrevalidacion
     */
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set descriptor
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Descriptor $descriptor
     * @return Cuadredevalidacion
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
}
