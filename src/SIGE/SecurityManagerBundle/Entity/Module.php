<?php

namespace SIGE\SecurityManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Exclude;

/**
 * Module
 *
 * @ORM\Table(name="mod_seguridad.nmodule")
 * @ORM\Entity(repositoryClass="SIGE\SecurityManagerBundle\Repository\ModuleRepository")
 * @ExclusionPolicy("none")
 */
class Module {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * 
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombredescriptivo", type="string", length=255)
     * 
     */
    private $nombredescriptivo;

    /**
     * @var string
     *
     * @ORM\Column(name="codename", type="string", length=255, unique=true)
     * 
     */
    private $codename;

    /**
     * @ORM\ManyToOne(targetEntity="App", inversedBy="modulos")
     * @ORM\JoinColumn(name="idapp", referencedColumnName="id")
     * @Exclude
     */
    private $app;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\SecurityManagerBundle\Entity\RolModule", mappedBy="module", cascade={"remove","persist"})
     * @Exclude
     */
    private $rolModules;
    
    /**
     * @ORM\OneToMany(targetEntity="Module", mappedBy="parent")
     */
    private $modulos;
    
    /**
     * @ORM\ManyToOne(targetEntity="Module", inversedBy="modulos")
     * @ORM\JoinColumn(name="parent", referencedColumnName="id")
     */
    private $parent;

    /**
     * Constructor
     */
    public function __construct() {
        $this->rolModules = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Module
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
    public function getId() {
        return $this->id;
    }

    /**
     * Set nombredescriptivo
     *
     * @param string $nombredescriptivo
     * @return Module
     */
    public function setNombredescriptivo($nombredescriptivo) {
        $this->nombredescriptivo = $nombredescriptivo;

        return $this;
    }

    /**
     * Get nombredescriptivo
     *
     * @return string 
     */
    public function getNombredescriptivo() {
        return $this->nombredescriptivo;
    }

    /**
     * Set codename
     *
     * @param string $codename
     * @return Module
     */
    public function setCodename($codename) {
        $this->codename = $codename;

        return $this;
    }

    /**
     * Get codename
     *
     * @return string 
     */
    public function getCodename() {
        return $this->codename;
    }

    /**
     * Set app
     *
     * @param \SIGE\SecurityManagerBundle\Entity\App $app
     * @return Module
     */
    public function setApp(\SIGE\SecurityManagerBundle\Entity\App $app = null) {
        $this->app = $app;

        return $this;
    }

    /**
     * Get app
     *
     * @return \SIGE\SecurityManagerBundle\Entity\App 
     */
    public function getApp() {
        return $this->app;
    }

    /**
     * Add rolModules
     *
     * @param \SIGE\SecurityManagerBundle\Entity\RolModule $rolModules
     * @return Module
     */
    public function addRolModule(\SIGE\SecurityManagerBundle\Entity\RolModule $rolModules) {
        $this->rolModules[] = $rolModules;

        return $this;
    }

    /**
     * Remove rolModules
     *
     * @param \SIGE\SecurityManagerBundle\Entity\RolModule $rolModules
     */
    public function removeRolModule(\SIGE\SecurityManagerBundle\Entity\RolModule $rolModules) {
        $this->rolModules->removeElement($rolModules);
    }

    /**
     * Get rolModules
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRolModules() {
        return $this->rolModules;
    }

    public function containsRol($rol, $name_rol = null) {
        foreach ($this->rolModules as $rolM) {
            if ($rolM->getRole() == $rol || $rolM->getRole()->getNombredescriptivo() == $name_rol) {
                return true;
            }
        }
        return false;
    }


    /**
     * Add modulos
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Module $modulos
     * @return Module
     */
    public function addModulo(\SIGE\SecurityManagerBundle\Entity\Module $modulos)
    {
        $this->modulos[] = $modulos;

        return $this;
    }

    /**
     * Remove modulos
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Module $modulos
     */
    public function removeModulo(\SIGE\SecurityManagerBundle\Entity\Module $modulos)
    {
        $this->modulos->removeElement($modulos);
    }

    /**
     * Get modulos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getModulos()
    {
        return $this->modulos;
    }

    /**
     * Set parent
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Module $parent
     * @return Module
     */
    public function setParent(\SIGE\SecurityManagerBundle\Entity\Module $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \SIGE\SecurityManagerBundle\Entity\Module 
     */
    public function getParent()
    {
        return $this->parent;
    }
}
