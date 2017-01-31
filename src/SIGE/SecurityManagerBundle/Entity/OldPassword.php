<?php

namespace SIGE\SecurityManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OldPassword
 *
 * @ORM\Table(name="mod_seguridad.tboldpassword")
 * @ORM\Entity(repositoryClass="SIGE\SecurityManagerBundle\Repository\OldPasswordRepository")
 */
class OldPassword
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
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\SecurityManagerBundle\Entity\Usuario", inversedBy="oldPassword")
     * @ORM\JoinColumn(name="iduser", referencedColumnName="id")
     */
    private $user;

    
    /**
     * Constructor
     */
    public function __construct() {
       
    }
    
    /**
     * Set id
     *
     * @param integer $id
     *
     * @return OldPassword
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
     * Set password
     *
     * @param string $password
     * @return OldPassword
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set user
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Usuario $user
     * @return OldPassword
     */
    public function setUser(\SIGE\SecurityManagerBundle\Entity\Usuario $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \SIGE\SecurityManagerBundle\Entity\Usuario 
     */
    public function getUser()
    {
        return $this->user;
    }
}
