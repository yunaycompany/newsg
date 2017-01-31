<?php

namespace SIGE\ModelGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Correlacionadordevariante
 *
 * @ORM\Table(name="mod_sige.tbcorrelacionadordevariante")
 * @ORM\Entity(repositoryClass="SIGE\ModelGeneratorBundle\Repository\CorrelacionadordevarianteRepository")
 */
class Correlacionadordevariante
{
    /**
     * @ORM\OneToOne(targetEntity="Variante")
     * @ORM\JoinColumn(name="variante", referencedColumnName="id")
     * @ORM\Id
     */
    private $variante;

    /**
     * @var int
     *
     * @ORM\Column(name="codvariante_i", type="integer")
     */
    private $codvarianteI;

    /**
     * @var int
     *
     * @ORM\Column(name="codvariante_ii", type="integer")
     */
    private $codvarianteIi;

    /**
     * @var string
     *
     * @ORM\Column(name="nombrevariante_i", type="string", length=255)
     */
    private $nombrevarianteI;

    /**
     * @var string
     *
     * @ORM\Column(name="nombrevariante_ii", type="string", length=255)
     */
    private $nombrevarianteIi;
    
  
    /**
     * Set idnummodelo
     *
     * @param string $idnummodelo
     * @return Correlacionadordevariante
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
     * @return Correlacionadordevariante
     */
    public function setIdsubnummodelo($idsubnummodelo)
    {
        $this->idsubnummodelo = $idsubnummodelo;

        return $this;
    }

    /**
     * Set variante
     *
     * @param integer $variante
     * @return Correlacionadordevariante
     */
    public function setVariante($variante)
    {
        $this->variante = $variante;

        return $this;
    }

    /**
     * Get variante
     *
     * @return integer 
     */
    public function getVariante()
    {
        return $this->variante;
    }

    /**
     * Set codvarianteI
     *
     * @param integer $codvarianteI
     * @return Correlacionadordevariante
     */
    public function setCodvarianteI($codvarianteI)
    {
        $this->codvarianteI = $codvarianteI;

        return $this;
    }

    /**
     * Get codvarianteI
     *
     * @return integer 
     */
    public function getCodvarianteI()
    {
        return $this->codvarianteI;
    }

    /**
     * Set codvarianteIi
     *
     * @param integer $codvarianteIi
     * @return Correlacionadordevariante
     */
    public function setCodvarianteIi($codvarianteIi)
    {
        $this->codvarianteIi = $codvarianteIi;

        return $this;
    }

    /**
     * Get codvarianteIi
     *
     * @return integer 
     */
    public function getCodvarianteIi()
    {
        return $this->codvarianteIi;
    }

    /**
     * Set nombrevarianteI
     *
     * @param string $nombrevarianteI
     * @return Correlacionadordevariante
     */
    public function setNombrevarianteI($nombrevarianteI)
    {
        $this->nombrevarianteI = $nombrevarianteI;

        return $this;
    }

    /**
     * Get nombrevarianteI
     *
     * @return string 
     */
    public function getNombrevarianteI()
    {
        return $this->nombrevarianteI;
    }

    /**
     * Set nombrevarianteIi
     *
     * @param string $nombrevarianteIi
     * @return Correlacionadordevariante
     */
    public function setNombrevarianteIi($nombrevarianteIi)
    {
        $this->nombrevarianteIi = $nombrevarianteIi;

        return $this;
    }

    /**
     * Get nombrevarianteIi
     *
     * @return string 
     */
    public function getNombrevarianteIi()
    {
        return $this->nombrevarianteIi;
    }
}
