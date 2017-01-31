<?php

namespace SIGE\ModelGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RolCentroInformante
 *
 * @ORM\Table(name="mod_sige.tbrol_centroinformante")
 * @ORM\Entity(repositoryClass="SIGE\ModelGeneratorBundle\Repository\RolCentroInformanteRepository")
 */
class RolCentroInformante
{
    /**
     * @ORM\ManyToOne(targetEntity="SIGE\RecordsClassifiersBundle\Entity\Centroinformante", inversedBy="roles")
     * @ORM\JoinColumn(name="codcentroinformante", referencedColumnName="id")
     * @ORM\Id
     */
    private $centroInformante;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\SecurityManagerBundle\Entity\Rol", inversedBy="centrosinformantes")
     * @ORM\JoinColumn(name="idrol", referencedColumnName="id")
     * @ORM\Id
     */
    private $rol;

    /**
     * @var string
     *
     * @ORM\Column(name="access", type="string", length=3)
     */
    private $access;

     /**
     * Set access
     *
     * @param string $access
     * @return RolCentroInformante
     */
    public function setAccess($access)
    {
        $this->access = $access;

        return $this;
    }

    /**
     * Get access
     *
     * @return string 
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * Set centroInformante
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Centroinformante $centroInformante
     * @return RolCentroInformante
     */
    public function setCentroInformante(\SIGE\RecordsClassifiersBundle\Entity\Centroinformante $centroInformante)
    {
        $this->centroInformante = $centroInformante;

        return $this;
    }

    /**
     * Get centroInformante
     *
     * @return \SIGE\RecordsClassifiersBundle\Entity\Centroinformante 
     */
    public function getCentroInformante()
    {
        return $this->centroInformante;
    }

    /**
     * Set rol
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Rol $rol
     * @return RolCentroInformante
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
}
