<?php

namespace SIGE\SecurityManagerBundle\Entity;

/**
 * Description of nNomenclador
 *
 * @author Yosbel
 */
use Doctrine\ORM\Mapping as ORM;

/**
 * Nomenclador
 *
 * @ORM\Table(name="mod_seguridad.tbnomencladorseguridad")
 * @ORM\Entity(repositoryClass="SIGE\SecurityManagerBundle\Repository\NomencladorSeguridadRepository")
 * 
 */
class NomencladorSeguridad {

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
     * @ORM\Column(name="nombreNomenclador", type="string", length=255)
     * 
     */
    private $nombreNomenclador;

    /**
     * @ORM\OneToMany(targetEntity="Permiso", mappedBy="nomenclador", cascade={"persist","remove"})
     */
    private $permisos;

   
    public function __construct() {
        $this->permisos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function addPermiso(\SIGE\SecurityManagerBundle\Entity\Permiso $permiso) {
        $permiso->setNomencladorSeguridad($this);
        $this->permisos[] = $permiso;
        return $this;
    }

    public function removePermiso(\SIGE\SecurityManagerBundle\Entity\Permiso $permiso) {
        $this->permisos->removeElement($permiso);
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
     * Set nombreNomenclador
     *
     * @param string $nombreNomenclador
     * @return NomencladorSeguridad
     */
    public function setNombreNomenclador($nombreNomenclador) {
        $this->nombreNomenclador = $nombreNomenclador;

        return $this;
    }

    /**
     * Get nombreNomenclador
     *
     * @return string 
     */
    public function getNombreNomenclador() {
        return $this->nombreNomenclador;
    }

    /**
     * Get permisos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPermisos() {
        return $this->permisos;
    }

}
