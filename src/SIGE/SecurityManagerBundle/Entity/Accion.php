<?php

namespace SIGE\SecurityManagerBundle\Entity;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Permiso
 *
 * @ORM\Table(name="mod_seguridad.naccion")
 * @ORM\Entity(repositoryClass="SIGE\SecurityManagerBundle\Repository\AccionRepository")
 *
 */
class Accion {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Permiso", mappedBy="accion", cascade={"persist","remove"})
     */
    private $permisos;

    /**
     * @var string
     *
     * @ORM\Column(name="accion", type="string", nullable=false)     
     * @Assert\NotBlank(message = "El valor de acción no puede ser vacío.")
     * 
     */
    private $accion;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->permisos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set accion
     *
     * @param string $accion
     * @return Accion
     */
    public function setAccion($accion)
    {
        $this->accion = $accion;

        return $this;
    }

    /**
     * Get accion
     *
     * @return string 
     */
    public function getAccion()
    {
        return $this->accion;
    }

    /**
     * Add permisos
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Permiso $permisos
     * @return Accion
     */
    public function addPermiso(\SIGE\SecurityManagerBundle\Entity\Permiso $permisos)
    {
        $this->permisos[] = $permisos;

        return $this;
    }

    /**
     * Remove permisos
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Permiso $permisos
     */
    public function removePermiso(\SIGE\SecurityManagerBundle\Entity\Permiso $permisos)
    {
        $this->permisos->removeElement($permisos);
    }

    /**
     * Get permisos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPermisos()
    {
        return $this->permisos;
    }
}
