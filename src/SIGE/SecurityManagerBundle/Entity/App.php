<?php

namespace SIGE\SecurityManagerBundle\Entity;

use SIGE\SecurityManagerBundle\Model\AppInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * App
 *
 * @ORM\Table(name="mod_seguridad.napp")
 * @ORM\Entity(repositoryClass="SIGE\SecurityManagerBundle\Repository\AppRepository") 
 */
class App implements AppInterface {

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
     * @var string
     *
     * @ORM\Column(name="nombredescriptivo", type="string", length=255)
     */
    private $nombredescriptivo;

    /**
     * @var string
     *
     * @ORM\Column(name="codename", type="string", length=255, unique=true)
     */
    private $codename;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\SecurityManagerBundle\Entity\Module", mappedBy="app", cascade={"remove","persist"})
     */
    private $modulos;

    /**
     * Constructor
     */
    public function __construct() {
        $this->modulos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return App
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
     * @return App
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
     * @return App
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
     * Add modulos
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Module $modulos
     * @return App
     */
    public function addModulo(\SIGE\SecurityManagerBundle\Entity\Module $modulos) {
        $this->modulos[] = $modulos;

        return $this;
    }

    /**
     * Remove modulos
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Module $modulos
     */
    public function removeModulo(\SIGE\SecurityManagerBundle\Entity\Module $modulos) {
        $this->modulos->removeElement($modulos);
    }

    /**
     * Get modulos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getModulos() {
        return $this->modulos;
    }

    /**
     * Set modulos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function setModulos($modules) {
        $this->modulos = $modules;
        return $this;
    }

}
