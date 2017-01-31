<?php

namespace SIGE\SecurityManagerBundle\Entity;

use SIGE\SecurityManagerBundle\Model\UserProfileInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\SerializedName;

/**
 * UserProfile
 *
 * @ORM\Table(name="mod_seguridad.tbuserprofile")
 * @ORM\Entity(repositoryClass="SIGE\SecurityManagerBundle\Repository\UserProfileRepository")
 */
class UserProfile implements UserProfileInterface {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="failedlogin", type="integer",length=10, nullable=true)
     * @Assert\Regex(pattern="/\d/", match=true)
     * @Assert\Length(max=10)
     * @SerializedName("failedLogin")
     */
    private $failedLogin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="passwordmodifyat", type="datetime", nullable=true)
     * @Assert\DateTime()
     * @SerializedName("passwordModifyAt")
     */
    private $passwordModifyAt;

    /**
     * @var int
     *
     * @ORM\Column(name="changepasswordrequired", type="smallint",length=5, nullable=true)
     * @Assert\Regex(pattern="/\d/", match=true)
     * @Assert\Length(max=5)
     * @SerializedName("changePasswordRequired")
     */
    private $changePasswordRequired;

    /**
     * @var string
     *
     * @ORM\Column(name="lastip", type="string", length=20, nullable=true)
     * @Assert\Regex(pattern="/\d/", match=false)
     * @Assert\Length(max=20)
     * @SerializedName("lastIp")
     */
    private $lastIp;

    /**
     *
     * @ORM\OneToOne(targetEntity="SIGE\SecurityManagerBundle\Entity\Usuario", inversedBy="userProfile")
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
     * @return UserProfile
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
     * Set failedLogin
     *
     * @param integer $failedLogin
     * @return UserProfile
     */
    public function setFailedLogin($failedLogin) {
        $this->failedLogin = $failedLogin;

        return $this;
    }

    /**
     * Get failedLogin
     *
     * @return integer 
     */
    public function getFailedLogin() {
        return $this->failedLogin;
    }

    /**
     * Set passwordModifyAt
     *
     * @param \DateTime $passwordModifyAt
     * @return UserProfile
     */
    public function setPasswordModifyAt($passwordModifyAt) {
        $this->passwordModifyAt = $passwordModifyAt;

        return $this;
    }

    /**
     * Get passwordModifyAt
     *
     * @return \DateTime 
     */
    public function getPasswordModifyAt() {
        return $this->passwordModifyAt;
    }

    /**
     * Set changePasswordRequired
     *
     * @param integer $changePasswordRequired
     * @return UserProfile
     */
    public function setChangePasswordRequired($changePasswordRequired) {
        $this->changePasswordRequired = $changePasswordRequired;

        return $this;
    }

    /**
     * Get changePasswordRequired
     *
     * @return integer 
     */
    public function getChangePasswordRequired() {
        return $this->changePasswordRequired;
    }

    /**
     * Set lastIp
     *
     * @param string $lastIp
     * @return UserProfile
     */
    public function setLastIp($lastIp) {
        $this->lastIp = $lastIp;

        return $this;
    }

    /**
     * Get lastIp
     *
     * @return string 
     */
    public function getLastIp() {
        return $this->lastIp;
    }

    /**
     * Set user
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Usuario $user
     * @return UserProfile
     */
    public function setUser(\SIGE\SecurityManagerBundle\Entity\Usuario $user = null) {
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

}
