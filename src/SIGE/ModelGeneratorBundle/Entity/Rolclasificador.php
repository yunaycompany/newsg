<?php

namespace SIGE\ModelGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rolclasificador
 *
 * @ORM\Table(name="mod_sige.tbrolclasificador")
 * @ORM\Entity(repositoryClass="SIGE\ModelGeneratorBundle\Repository\RolclasificadorRepository")
 */
class Rolclasificador
{
    /**
     * @var String
     * @ORM\Column(name="clasificaciones", type="string")
     */
    private $clasificaciones;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\SecurityManagerBundle\Entity\Rol")
     * @ORM\JoinColumn(name="idrol", referencedColumnName="id")
     * @ORM\Id
     */
    private $rol;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\RecordsClassifiersBundle\Entity\Clasificador")
     * @ORM\JoinColumn(name="idclasificador", referencedColumnName="id")
     * @ORM\Id
     */
    private $clasificador;

    /**
     * Set clasificaciones
     *
     * @param string $clasificaciones
     * @return Rolclasificador
     */
    public function setClasificaciones($clasificaciones)
    {
        $this->clasificaciones = $clasificaciones;

        return $this;
    }

    /**
     * Get clasificaciones
     *
     * @return string 
     */
    public function getClasificaciones()
    {
        return $this->clasificaciones;
    }

    /**
     * Set idrol
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Rol $idrol
     * @return Rolclasificador
     */
    public function setIdrol(\SIGE\SecurityManagerBundle\Entity\Rol $idrol)
    {
        $this->idrol = $idrol;

        return $this;
    }

    /**
     * Set idclasificador
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Clasificador $idclasificador
     * @return Rolclasificador
     */
    public function setIdclasificador(\SIGE\RecordsClassifiersBundle\Entity\Clasificador $idclasificador)
    {
        $this->idclasificador = $idclasificador;

        return $this;
    }

    /**
     * Set rol
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Rol $rol
     * @return Rolclasificador
     */
    public function setRol(\SIGE\SecurityManagerBundle\Entity\Rol $rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return \SIGE\SecurityManagerBundle\Entity\Rol 
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set clasificador
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Clasificador $clasificador
     * @return Rolclasificador
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
}
