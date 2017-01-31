<?php

namespace SIGE\ModelGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Roldescriptordelmodelo
 *
 * @ORM\Table(name="mod_sige.tbroldescriptordelmodelo")
 * @ORM\Entity(repositoryClass="SIGE\ModelGeneratorBundle\Repository\RoldescriptordelmodeloRepository")
 */
class Roldescriptor
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\SecurityManagerBundle\Entity\Rol", inversedBy="rolDescriptores")
     * @ORM\JoinColumn(name="idrol", referencedColumnName="id")
     */
    private $rol;

    /**
     * /**
      * @ORM\ManyToOne(targetEntity="Descriptor")
      * @ORM\JoinColumns({
     *     @ORM\JoinColumn(name="idnummodelo", referencedColumnName="idnummodelo"),
     *     @ORM\JoinColumn(name="idsubnummodelo", referencedColumnName="idsubnummodelo")
      * })
      */
    private $descriptor;

    /**
     * @var string
     *
     * @ORM\Column(name="access", type="string", length=3)
     */
    private $access;

    /**
     * Get descriptor
     *
     * @return string 
     */
    public function getDescriptor()
    {
        return $this->descriptor;
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
     * Set id
     *
     * @param integer $id
     *
     * @return Roldescriptor
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
     * Get rol
     *
     * @return \SIGE\SecurityManagerBundle\Entity\Rol 
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set access
     *
     * @param string $access
     * @return Roldescriptor
     */
    public function setAccess($access)
    {
        $this->access = $access;

        return $this;
    }

    /**
     * Set rol
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Rol $rol
     * @return Roldescriptor
     */
    public function setRol(\SIGE\SecurityManagerBundle\Entity\Rol $rol = null)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Set descriptor
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Descriptor $descriptor
     * @return Roldescriptor
     */
    public function setDescriptor(\SIGE\ModelGeneratorBundle\Entity\Descriptor $descriptor = null)
    {
        $this->descriptor = $descriptor;

        return $this;
    }
}
