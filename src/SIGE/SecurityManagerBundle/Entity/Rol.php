<?php

namespace SIGE\SecurityManagerBundle\Entity;

use SIGE\SecurityManagerBundle\Model\RolInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Expose;

/**
 * Rol
 *
 * @ORM\Table(name="mod_seguridad.tbrol")
 * @ORM\Entity(repositoryClass="SIGE\SecurityManagerBundle\Repository\RolRepository")
 *
 */
class Rol implements RolInterface {

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
     * @ORM\Column(name="nombredescriptivo", type="string", length=50)
     * @Assert\NotBlank(message = "El valor del nombre descriptivo del rol no puede ser vacío.")
     * @Assert\Regex(pattern="/\d/", match=false)
     * @Assert\Length(max=50)
     * 
     */
    private $nombredescriptivo;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     * @Assert\NotBlank(message = "El valor de la descripción del rol no puede ser vacío.")
     * @Assert\Length(max=255)
     *
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="SIGE\SecurityManagerBundle\Entity\Usuario", inversedBy="roles")
     * @ORM\JoinTable(name="mod_seguridad.tbuserrol",
     *     joinColumns={@ORM\JoinColumn(name="idrol", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="iduser", referencedColumnName="id")})
     * @Exclude
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\SecurityManagerBundle\Entity\RolModule", mappedBy="role", cascade={"remove","persist"})
     * @Exclude
     */
    private $modules;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\ModelGeneratorBundle\Entity\Acotacionesalmodelo", mappedBy="rol", cascade={"remove", "persist"})
     * @Exclude
     */
    private $acotaciones;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\ModelGeneratorBundle\Entity\RolCentroInformante", mappedBy="centroInformante")
     * @Exclude
     */
    private $rolCentrosInformantes;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\ModelGeneratorBundle\Entity\Rolclasificador", mappedBy="clasificador")
     * @Exclude
     */
    private $rolClasificadores;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\ModelGeneratorBundle\Entity\Roldescriptor", mappedBy="rol")
     * @Exclude
     */
    private $rolDescriptores;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->modules = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    
    public function siesta($module) {
        if($this->modules->contains($module))
            return true;
        return false;
    }
    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Rol
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombredescriptivo
     *
     * @param string $nombredescriptivo
     * @return Rol
     */
    public function setNombredescriptivo($nombredescriptivo)
    {
        $this->nombredescriptivo = $nombredescriptivo;

        return $this;
    }

    /**
     * Get nombredescriptivo
     *
     * @return string 
     */
    public function getNombredescriptivo()
    {
        return $this->nombredescriptivo;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Rol
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add users
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Usuario $users
     * @return Rol
     */
    public function addUser(\SIGE\SecurityManagerBundle\Entity\Usuario $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Usuario $users
     */
    public function removeUser(\SIGE\SecurityManagerBundle\Entity\Usuario $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add modules
     *
     * @param \SIGE\SecurityManagerBundle\Entity\RolModule $modules
     * @return Rol
     */
    public function addModule(\SIGE\SecurityManagerBundle\Entity\RolModule $modules)
    {
        $this->modules[] = $modules;

        return $this;
    }

    /**
     * Remove modules
     *
     * @param \SIGE\SecurityManagerBundle\Entity\RolModule $modules
     */
    public function removeModule(\SIGE\SecurityManagerBundle\Entity\RolModule $modules)
    {
        $this->modules->removeElement($modules);
    }

    /**
     * Get modules
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getModules()
    {
        return $this->modules;
    }

    /**
     * Get acotaciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAcotaciones()
    {
        return $this->acotaciones;
    }

    /**
     * Add acotaciones
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Acotacionesalmodelo $acotaciones
     * @return Rol
     */
    public function addAcotacione(\SIGE\ModelGeneratorBundle\Entity\Acotacionesalmodelo $acotaciones)
    {
        $this->acotaciones[] = $acotaciones;

        return $this;
    }

    /**
     * Remove acotaciones
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Acotacionesalmodelo $acotaciones
     */
    public function removeAcotacione(\SIGE\ModelGeneratorBundle\Entity\Acotacionesalmodelo $acotaciones)
    {
        $this->acotaciones->removeElement($acotaciones);
    }

    /**
     * Add rolCentrosInformantes
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\RolCentroInformante $rolCentrosInformantes
     * @return Rol
     */
    public function addRolCentrosInformante(\SIGE\ModelGeneratorBundle\Entity\RolCentroInformante $rolCentrosInformantes)
    {
        $this->rolCentrosInformantes[] = $rolCentrosInformantes;

        return $this;
    }

    /**
     * Remove rolCentrosInformantes
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\RolCentroInformante $rolCentrosInformantes
     */
    public function removeRolCentrosInformante(\SIGE\ModelGeneratorBundle\Entity\RolCentroInformante $rolCentrosInformantes)
    {
        $this->rolCentrosInformantes->removeElement($rolCentrosInformantes);
    }

    /**
     * Get rolCentrosInformantes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRolCentrosInformantes()
    {
        return $this->rolCentrosInformantes;
    }

    /**
     * Add rolClasificadores
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Rolclasificador $rolClasificadores
     * @return Rol
     */
    public function addRolClasificadore(\SIGE\ModelGeneratorBundle\Entity\Rolclasificador $rolClasificadores)
    {
        $this->rolClasificadores[] = $rolClasificadores;

        return $this;
    }

    /**
     * Remove rolClasificadores
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Rolclasificador $rolClasificadores
     */
    public function removeRolClasificadore(\SIGE\ModelGeneratorBundle\Entity\Rolclasificador $rolClasificadores)
    {
        $this->rolClasificadores->removeElement($rolClasificadores);
    }

    /**
     * Get rolClasificadores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRolClasificadores()
    {
        return $this->rolClasificadores;
    }

    /**
     * Add rolDescriptores
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Roldescriptor $rolDescriptores
     * @return Rol
     */
    public function addRolDescriptore(\SIGE\ModelGeneratorBundle\Entity\Roldescriptor $rolDescriptores)
    {
        $this->rolDescriptores[] = $rolDescriptores;

        return $this;
    }

    /**
     * Remove rolDescriptores
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Roldescriptor $rolDescriptores
     */
    public function removeRolDescriptore(\SIGE\ModelGeneratorBundle\Entity\Roldescriptor $rolDescriptores)
    {
        $this->rolDescriptores->removeElement($rolDescriptores);
    }

    /**
     * Get rolDescriptores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRolDescriptores()
    {
        return $this->rolDescriptores;
    }
}
