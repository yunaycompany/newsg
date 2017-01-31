<?php

namespace SIGE\ToolsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Maestroclasificador
 *
 * @ORM\Table(name="mod_sige.tbmaestroclasificador")
 * @ORM\Entity(repositoryClass="SIGE\ToolsBundle\Repository\MaestroclasificadorRepository")
 */
class Maestroclasificador
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
     *@ORM\ManyToOne(targetEntity="SIGE\ToolsBundle\Entity\Maestro", inversedBy="clasificadores")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="alias", referencedColumnName="alias"),
     *      @ORM\JoinColumn(name="fechadecierre", referencedColumnName="fechadecierre")
     * })
     */
    private $maestro;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\RecordsClassifiersBundle\Entity\Clasificador",inversedBy="maestros")
     * @ORM\JoinColumn(name="codclasificador", referencedColumnName="id")
     */
    private $clasificador;

    /**
     * Set fechadecierre
     *
     * @param \DateTime $fechadecierre
     * @return Maestroclasificador
     */
    public function setFechadecierre($fechadecierre)
    {
        $this->fechadecierre = $fechadecierre;

        return $this;
    }

    /**
     * Set maestro
     *
     * @param \SIGE\ToolsBundle\Entity\Maestro $maestro
     * @return Maestroclasificador
     */
    public function setMaestro(\SIGE\ToolsBundle\Entity\Maestro $maestro = null)
    {
        $this->maestro = $maestro;

        return $this;
    }

    /**
     * Get maestro
     *
     * @return \SIGE\ToolsBundle\Entity\Maestro 
     */
    public function getMaestro()
    {
        return $this->maestro;
    }

    /**
     * Set clasificador
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Clasificador $clasificador
     * @return Maestroclasificador
     */
    public function setClasificador(\SIGE\RecordsClassifiersBundle\Entity\Clasificador $clasificador)
    {
        $this->clasificador = $clasificador;

        return $this;
    }

    /**
     * Get clasificador
     *
     * @return \SIGE\RecordsClassifiersBundle\Entity\Clasificador 
     */
    public function getClasificador()
    {
        return $this->clasificador;
    }
    
    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Maestroclasificador
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
}
