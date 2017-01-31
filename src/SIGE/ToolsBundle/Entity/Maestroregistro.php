<?php

namespace SIGE\ToolsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Maestroregistro
 *
 * @ORM\Table(name="mod_sige.tbmaestroregistro")
 * @ORM\Entity(repositoryClass="SIGE\ToolsBundle\Repository\MaestroregistroRepository")
 */
class Maestroregistro
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
     * @ORM\ManyToOne(targetEntity="SIGE\ToolsBundle\Entity\Maestro", inversedBy="registros")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="alias", referencedColumnName="alias"),
     *      @ORM\JoinColumn(name="fechadecierre", referencedColumnName="fechadecierre")
     * })
     */
    private $maestro;

    /**
     *
     * @ORM\ManyToOne(targetEntity="SIGE\RecordsClassifiersBundle\Entity\Registro", inversedBy="maestros")
     * @ORM\JoinColumn(name="codregistro", referencedColumnName="id")
     */
    private $registro;

    /**
     * Set maestro
     *
     * @param \SIGE\ToolsBundle\Entity\Maestro $maestro
     * @return Maestroregistro
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
     * Set registro
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Registro $registro
     * @return Maestroregistro
     */
    public function setRegistro(\SIGE\RecordsClassifiersBundle\Entity\Registro $registro)
    {
        $this->registro = $registro;

        return $this;
    }

    /**
     * Get registro
     *
     * @return \SIGE\RecordsClassifiersBundle\Entity\Registro 
     */
    public function getRegistro()
    {
        return $this->registro;
    }
    
    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Maestroregistro
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
