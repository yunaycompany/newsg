<?php

namespace SIGE\ModelGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IndicadorPagina
 *
 * @ORM\Table(name="mod_sige.tbindicadorpagina")
 * @ORM\Entity(repositoryClass="SIGE\ModelGeneratorBundle\Repository\IndicadorPaginaRepository")
 */
class IndicadorPagina
{
    /**
     * @ORM\ManyToOne(targetEntity="SIGE\RecordsClassifiersBundle\Entity\Indicador")
     * @ORM\JoinColumn(name="idcodindicador", referencedColumnName="id")
     * @ORM\Id
     */
    private $indicador;

    /**
     * @ORM\ManyToOne(targetEntity="Pagina")
     * @ORM\JoinColumn(name="idnumpagina", referencedColumnName="id")
     * @ORM\Id
     */
    private $pagina;

    /**
     * @var int
     *
     * @ORM\Column(name="codfila", type="integer")
     * @ORM\Id
     */
    private $codfila;

    /**
     * @var int
     *
     * @ORM\Column(name="niveldeinteres", type="integer")
     */
    private $niveldeinteres;

    /**
     * @var string
     *
     * @ORM\Column(name="formula", type="string", length=255)
     */
    private $formula;

    /**
     * @var int
     *
     * @ORM\Column(name="posiciondelafila", type="integer")
     */
    private $posiciondelafila;

    /**
     * @var string
     *
     * @ORM\Column(name="nombredescriptivo", type="string", length=255)
     */
    private $nombredescriptivo;

    /**
     * @var bool
     *
     * @ORM\Column(name="captable", type="boolean")
     */
    private $captable;

    /**
     * @var string
     *
     * @ORM\Column(name="nivelsuperior", type="string", length=20)
     */
    private $nivelsuperior;

    /**
     * @var int
     *
     * @ORM\Column(name="nivel", type="integer")
     */
    private $nivel;

    /**
     * Set indicador
     *
     * @param string $indicador
     * @return IndicadorPagina
     */
    public function setIndicador($indicador)
    {
        $this->indicador = $indicador;

        return $this;
    }

    /**
     * Get indicador
     *
     * @return string 
     */
    public function getIndicador()
    {
        return $this->indicador;
    }

    /**
     * Set idnummodelo
     *
     * @param string $idnummodelo
     * @return IndicadorPagina
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
     * @return IndicadorPagina
     */
    public function setIdsubnummodelo($idsubnummodelo)
    {
        $this->idsubnummodelo = $idsubnummodelo;

        return $this;
    }

    /**
     * Set numpagina
     *
     * @param integer $numpagina
     * @return IndicadorPagina
     */
    public function setNumpagina($numpagina)
    {
        $this->numpagina = $numpagina;

        return $this;
    }

    /**
     * Set codfila
     *
     * @param integer $codfila
     * @return IndicadorPagina
     */
    public function setCodfila($codfila)
    {
        $this->codfila = $codfila;

        return $this;
    }

    /**
     * Get codfila
     *
     * @return integer 
     */
    public function getCodfila()
    {
        return $this->codfila;
    }

    /**
     * Set niveldeinteres
     *
     * @param integer $niveldeinteres
     * @return IndicadorPagina
     */
    public function setNiveldeinteres($niveldeinteres)
    {
        $this->niveldeinteres = $niveldeinteres;

        return $this;
    }

    /**
     * Get niveldeinteres
     *
     * @return integer 
     */
    public function getNiveldeinteres()
    {
        return $this->niveldeinteres;
    }

    /**
     * Set posiciondelafila
     *
     * @param integer $posiciondelafila
     * @return IndicadorPagina
     */
    public function setPosiciondelafila($posiciondelafila)
    {
        $this->posiciondelafila = $posiciondelafila;

        return $this;
    }

    /**
     * Get posiciondelafila
     *
     * @return integer 
     */
    public function getPosiciondelafila()
    {
        return $this->posiciondelafila;
    }

    /**
     * Set nombredescriptivo
     *
     * @param string $nombredescriptivo
     * @return IndicadorPagina
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
     * Set seccion
     *
     * @param string $seccion
     * @return IndicadorPagina
     */
    public function setSeccion($seccion)
    {
        $this->seccion = $seccion;

        return $this;
    }
    
    /**
     * Set captable
     *
     * @param boolean $captable
     * @return IndicadorPagina
     */
    public function setCaptable($captable)
    {
        $this->captable = $captable;

        return $this;
    }

    /**
     * Get captable
     *
     * @return boolean 
     */
    public function getCaptable()
    {
        return $this->captable;
    }

    /**
     * Set nivelsuperior
     *
     * @param string $nivelsuperior
     * @return IndicadorPagina
     */
    public function setNivelsuperior($nivelsuperior)
    {
        $this->nivelsuperior = $nivelsuperior;

        return $this;
    }

    /**
     * Get nivelsuperior
     *
     * @return string 
     */
    public function getNivelsuperior()
    {
        return $this->nivelsuperior;
    }

    /**
     * Set nivel
     *
     * @param integer $nivel
     * @return IndicadorPagina
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return integer 
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set pagina
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Pagina $pagina
     * @return IndicadorPagina
     */
    public function setPagina(\SIGE\ModelGeneratorBundle\Entity\Pagina $pagina = null)
    {
        $this->pagina = $pagina;

        return $this;
    }

    /**
     * Get pagina
     *
     * @return \SIGE\ModelGeneratorBundle\Entity\Pagina 
     */
    public function getPagina()
    {
        return $this->pagina;
    }

    /**
     * Set formula
     *
     * @param string $formula
     * @return IndicadorPagina
     */
    public function setFormula($formula)
    {
        $this->formula = $formula;

        return $this;
    }

    /**
     * Get formula
     *
     * @return string 
     */
    public function getFormula()
    {
        return $this->formula;
    }
}
