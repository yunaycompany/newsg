<?php

namespace SIGE\SecurityManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RolModule
 *
 * @ORM\Table(name="mod_seguridad.tbrolmodule")
 * @ORM\Entity(repositoryClass="SIGE\SecurityManagerBundle\Repository\RolModuleRepository")
 */
class RolModule {

   

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\SecurityManagerBundle\Entity\Module", inversedBy="modules")
     * @ORM\JoinColumn(name="idmodule", referencedColumnName="id")
     * @ORM\Id
     */
    private $module;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\SecurityManagerBundle\Entity\Rol", inversedBy="rolModules")
     * @ORM\JoinColumn(name="idrol", referencedColumnName="id")
     * @ORM\Id
     */
    private $role;

    /**
     * Constructor
     */
    public function __construct() {
        
    }

    

    /**
     * Set module
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Module $module
     * @return RolModule
     */
    public function setModule(\SIGE\SecurityManagerBundle\Entity\Module $module = null) {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module
     *
     * @return \SIGE\SecurityManagerBundle\Entity\Module 
     */
    public function getModule() {
        return $this->module;
    }

    /**
     * Set role
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Rol $role
     * @return RolModule
     */
    public function setRole(\SIGE\SecurityManagerBundle\Entity\Rol $role = null) {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \SIGE\SecurityManagerBundle\Entity\Rol 
     */
    public function getRole() {
        return $this->role;
    }

}
