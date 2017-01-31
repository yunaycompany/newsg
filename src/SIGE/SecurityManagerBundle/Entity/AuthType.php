<?php

namespace SIGE\SecurityManagerBundle\Entity;

use SIGE\SecurityManagerBundle\Model\AuthTypeInterface;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Exclude;

/**
 * AuthType
 *
 * @ORM\Table(name="mod_seguridad.nauth_type")
 * @ORM\Entity(repositoryClass="SIGE\SecurityManagerBundle\Repository\AuthTypeRepository")
 */
class AuthType implements AuthTypeInterface {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="authtype", type="string", length=50)
     */
    private $authtype;

    /**
     *
     *
     * @ORM\OneToMany(targetEntity="SIGE\SecurityManagerBundle\Entity\Usuario", mappedBy="authType", cascade={"remove","persist"})
     * @Exclude
     */
    private $usuarios;

    /**
     * Constructor
     */
    public function __construct() {
        $this->usuarios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return AuthType
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
     * Set authtype
     *
     * @param string $authtype
     * @return AuthType
     */
    public function setAuthtype($authtype) {
        $this->authtype = $authtype;

        return $this;
    }
    
    /**
     * Set authtype
     *
     * @param string $user
     * @return AuthType
     */
    public function setUser($user) {
        $this->usuarios = $user;

        return $this;
    }

    /**
     * Get authtype
     *
     * @return string 
     */
    public function getAuthtype() {
        return $this->authtype;
    }

    
    

    /**
     * Get usuarios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsuarios() {
        return $this->usuarios;
    }

    /**
     * Add usuarios
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Usuario $usuarios
     * @return AuthType
     */
    public function addUsuario(\SIGE\SecurityManagerBundle\Entity\Usuario $usuarios) {
        $this->usuarios[] = $usuarios;

        return $this;
    }

    /**
     * Remove usuarios
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Usuario $usuarios
     */
    public function removeUsuario(\SIGE\SecurityManagerBundle\Entity\Usuario $usuarios) {
        $this->usuarios->removeElement($usuarios);
    }

    public function __toString() {
       return $this->authtype;
    }
}
