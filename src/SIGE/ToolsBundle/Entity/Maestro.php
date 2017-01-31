<?php

namespace SIGE\ToolsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Maestro
 *
 * @ORM\Table(name="mod_sige.tbmaestro")
 * @ORM\Entity(repositoryClass="SIGE\ToolsBundle\Repository\MaestroRepository")
 */
class Maestro
{
    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="alias", type="string", length=15)
     */
    private $alias;

    /**
     * @var \DateTime
     * @ORM\Id
     * @ORM\Column(name="fechadecierre", type="datetime")
     */
    private $fechadecierre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadegeneracion", type="datetime")
     */
    private $fechadegeneracion;

    /**
     * @var string
     *
     * @ORM\Column(name="nombredescriptivo", type="string", length=50)
     */
    private $nombredescriptivo;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=255)
     */
    private $observaciones;
    
    /**
     * @ORM\OneToMany(targetEntity="SIGE\ToolsBundle\Entity\Maestroclasificador", mappedBy="maestro")
     */
    private $clasificadores;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\ToolsBundle\Entity\Maestroregistro", mappedBy="maestro")
     */
    private $registros;

    /**
     * Set alias
     *
     * @param string $alias
     * @return Maestro
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string 
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set fechadecierre
     *
     * @param \DateTime $fechadecierre
     * @return Maestro
     */
    public function setFechadecierre($fechadecierre)
    {
        $this->fechadecierre = $fechadecierre;

        return $this;
    }

    /**
     * Get fechadecierre
     *
     * @return \DateTime 
     */
    public function getFechadecierre()
    {
        return $this->fechadecierre;
    }

    /**
     * Set fechadegeneracion
     *
     * @param \DateTime $fechadegeneracion
     * @return Maestro
     */
    public function setFechadegeneracion($fechadegeneracion)
    {
        $this->fechadegeneracion = $fechadegeneracion;

        return $this;
    }

    /**
     * Get fechadegeneracion
     *
     * @return \DateTime 
     */
    public function getFechadegeneracion()
    {
        return $this->fechadegeneracion;
    }

    /**
     * Set nombredescriptivo
     *
     * @param string $nombredescriptivo
     * @return Maestro
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
     * Set observaciones
     *
     * @param string $observaciones
     * @return Maestro
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->clasificadores = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add clasificadores
     *
     * @param \SIGE\ToolsBundle\Entity\Maestroclasificador $clasificadores
     * @return Maestro
     */
    public function addClasificadore(\SIGE\ToolsBundle\Entity\Maestroclasificador $clasificadores)
    {
        $this->clasificadores[] = $clasificadores;

        return $this;
    }

    /**
     * Remove clasificadores
     *
     * @param \SIGE\ToolsBundle\Entity\Maestroclasificador $clasificadores
     */
    public function removeClasificadore(\SIGE\ToolsBundle\Entity\Maestroclasificador $clasificadores)
    {
        $this->clasificadores->removeElement($clasificadores);
    }

    /**
     * Get clasificadores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClasificadores()
    {
        return $this->clasificadores;
    }

    /**
     * Add registros
     *
     * @param \SIGE\ToolsBundle\Entity\Maestroregistro $registros
     * @return Maestro
     */
    public function addRegistro(\SIGE\ToolsBundle\Entity\Maestroregistro $registros)
    {
        $this->registros[] = $registros;

        return $this;
    }

    /**
     * Remove registros
     *
     * @param \SIGE\ToolsBundle\Entity\Maestroregistro $registros
     */
    public function removeRegistro(\SIGE\ToolsBundle\Entity\Maestroregistro $registros)
    {
        $this->registros->removeElement($registros);
    }

    /**
     * Get registros
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRegistros()
    {
        return $this->registros;
    }
}
