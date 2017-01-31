<?php

namespace SIGE\SecurityManagerBundle\Entity;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Permiso
 *
 * @author Yosbel
 */
use Doctrine\ORM\Mapping as ORM;




/**
 * Permiso
 *
 * @ORM\Table(name="mod_seguridad.tbpermiso")
 * @ORM\Entity(repositoryClass="SIGE\SecurityManagerBundle\Repository\PermisoRepository")
 *
 */
class Permiso {

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="permisos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iduser", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     */
    private $user;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="NomencladorSeguridad", inversedBy="permisos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idnomencladorseguridad", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     * 
     */
    private $nomenclador;
    
    
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Accion", inversedBy="permisos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idaccion", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * })
     * 
     */
    private $accion;
    
    

    /**
     * Set user
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Usuario $user
     * @return Permiso
     */
    public function setUser(\SIGE\SecurityManagerBundle\Entity\Usuario $user) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \SIGE\SecurityManagerBundle\Entity\Usuario 
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set nomenclador
     *
     * @param \SIGE\SecurityManagerBundle\Entity\NomencladorSeguridad $nomenclador
     * @return Permiso
     */
    public function setNomenclador(\SIGE\SecurityManagerBundle\Entity\NomencladorSeguridad $nomenclador) {
        $this->nomenclador = $nomenclador;

        return $this;
    }

    /**
     * Get nomenclador
     *
     * @return \SIGE\SecurityManagerBundle\Entity\NomencladorSeguridad 
     */
    public function getNomenclador() {
        return $this->nomenclador;
    }


    /**
     * Set accion
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Accion $accion
     * @return Permiso
     */
    public function setAccion(\SIGE\SecurityManagerBundle\Entity\Accion $accion)
    {
        $this->accion = $accion;

        return $this;
    }

    /**
     * Get accion
     *
     * @return \SIGE\SecurityManagerBundle\Entity\Accion 
     */
    public function getAccion()
    {
        return $this->accion;
    }
}
