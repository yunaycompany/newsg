<?php

namespace SIGE\ModelGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Correlacionadordeindicadores
 *
 * @ORM\Table(name="mod_sige.tbcorrelacionadordeindicadores")
 * @ORM\Entity(repositoryClass="SIGE\ModelGeneratorBundle\Repository\CorrelacionadordeindicadoresRepository")
 */
class Correlacionadordeindicadores
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="IndicadorPagina")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="codfila", referencedColumnName="codfila"),
     *      @ORM\JoinColumn(name="idcodindicador", referencedColumnName="idcodindicador"),
     *      @ORM\JoinColumn(name="idnumpagina", referencedColumnName="idnumpagina"),
     * })
     */
    private $indicador;

    /**
     * @var int
     *
     * @ORM\Column(name="codactividadasociada", type="integer")
     */
    private $codactividadasociada;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * Set codactividadasociada
     *
     * @param integer $codactividadasociada
     * @return Correlacionadordeindicadores
     */
    public function setCodactividadasociada($codactividadasociada)
    {
        $this->codactividadasociada = $codactividadasociada;

        return $this;
    }

    /**
     * Get codactividadasociada
     *
     * @return integer 
     */
    public function getCodactividadasociada()
    {
        return $this->codactividadasociada;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Correlacionadordeindicadores
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set indicador
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\IndicadorPagina $indicador
     * @return Correlacionadordeindicadores
     */
    public function setIndicador(\SIGE\ModelGeneratorBundle\Entity\IndicadorPagina $indicador = null)
    {
        $this->indicador = $indicador;

        return $this;
    }

    /**
     * Get indicador
     *
     * @return \SIGE\ModelGeneratorBundle\Entity\IndicadorPagina 
     */
    public function getIndicador()
    {
        return $this->indicador;
    }
    
    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Correlacionadordeindicadores
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
}
