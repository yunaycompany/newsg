<?php

namespace SIGE\SecurityManagerBundle\Entity;

use SIGE\SecurityManagerBundle\Model\UsuarioInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use \Symfony\Component\Security\Core\User\UserInterface;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Usuario
 *
 * @ORM\Table(name="mod_seguridad.tbuser")
 * @ORM\Entity(repositoryClass="SIGE\SecurityManagerBundle\Repository\UsuarioRepository")
 */
class Usuario implements UserInterface, UsuarioInterface {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"all","userrol", "details","login"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=50)
     * @Assert\NotBlank(message = "El valor usuario no puede ser vacío.")
     * @Assert\Length(max=50)
     * @Groups({"all", "details","userrol","login"})
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     * @Assert\NotBlank(message = "El valor de la contraseña no puede ser vacío.")
     * @Assert\Length(max=255)
     * @Groups({"login"})
     * @Exclude
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     * @Assert\NotBlank(message = "El valor del nombre no puede ser vacío.")
     * @Assert\Regex(pattern="/\d/", match=false)
     * @Assert\Length(max=50)
     * @Groups({"all", "details","userrol","login"})
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=50)
     * @Assert\NotBlank(message = "El valor de los apellidos no puede ser vacío.")
     * @Assert\Regex(pattern="/\d/", match=false)
     * @Assert\Length(max=50)
     * @Groups({"all", "details","userrol","login"})
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=true)
     * @Assert\Email()
     * @Assert\Length(max=50)
     * @Groups({"all", "details","userrol","login"})
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="smallint", length=5)
     * @Assert\NotBlank(message = "El valor del estado no puede ser vacío.")
     * @Assert\Length(max=5)
     * @Groups({"all", "userrol","details"})
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedon", type="datetime", nullable=true)
     * @Assert\DateTime()
     * @Groups({"all","userrol", "details"})
     * @Type("DateTime<'Y-m-d'>")
     * @SerializedName("updatedOn")
     * @Groups({"all"})
     */
    private $updatedOn;

    /**
     *
     * @ORM\ManyToOne(targetEntity="LdapConnections", inversedBy="user")
     * @ORM\JoinColumn(name="ldapid", referencedColumnName="id")
     * @Groups({"all", "userrol","details"})
     */
    private $ldap;

    /**
     * @var string
     *
     * @ORM\Column(name="dn", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     * @Groups({"all", "details"})
     */
    private $dn;
    
    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     * @Groups({"all", "details", "login"})
     */
    private $token;

    /**
     * @var int
     *
     * @ORM\Column(name="online", type="smallint", nullable=true)
     * @Assert\Regex(pattern="/\d/", match=true)
     * @Groups({"all", "details"})
     */
    private $online;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastaction", type="datetime", nullable=true)
     * @Assert\DateTime()
     * @Groups({"all", "details"})
     * @Type("DateTime<'Y-m-d'>")
     * @SerializedName("lastAction")
     * 
     */
    private $lastAction;

    /**
     *
     * @ORM\ManyToOne(targetEntity="AuthType", inversedBy="usuarios")
     * @ORM\JoinColumn(name="idauthtype", referencedColumnName="id")     
     * @Groups({"all", "details"})
     * @SerializedName("authType")
     *
     */
    private $authType;

    /**
     * @ORM\OneToOne(targetEntity="SIGE\SecurityManagerBundle\Entity\UserProfile", mappedBy="user", cascade={"remove","persist"})
     * @Groups({"all", "details"})
     * @SerializedName("userProfile")
     */
    private $userProfile;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\SecurityManagerBundle\Entity\IpAddress", mappedBy="user", cascade={"remove","persist"},orphanRemoval=true)
     * @SerializedName("ipAddress")
     *
     */
    private $ipAddress;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\SecurityManagerBundle\Entity\OldPassword", mappedBy="user", cascade={"remove","persist"})
     * @SerializedName("oldPassword")
     */
    private $oldPassword;

    /**
     * @ORM\ManyToMany(targetEntity="SIGE\SecurityManagerBundle\Entity\Rol", mappedBy="users")
     * 
     */
    private $roles;

    /**
     * @ORM\OneToMany(targetEntity="Permiso", mappedBy="user", cascade={"persist","remove"})
     * 
     * 
     */
    private $permisos;

    /**
     * Constructor
     */
    public function __construct() {
        $this->ipAddress = new \Doctrine\Common\Collections\ArrayCollection();
        $this->oldPassword = new \Doctrine\Common\Collections\ArrayCollection();
        $this->roles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->permisos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Usuario
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
     * Set username
     *
     * @param string $username
     * @return Usuario
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password) {
        $this->password = $password;


        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Usuario
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return Usuario
     */
    public function setSurname($surname) {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname() {
        return $this->surname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Usuario
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Usuario
     */
    public function setStatus($status) {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Set updatedOn
     *
     * @param \DateTime $updatedOn
     * @return Usuario
     */
    public function setUpdatedOn($updatedOn) {
        $this->updatedOn = $updatedOn;

        return $this;
    }

    /**
     * Get updatedOn
     *
     * @return \DateTime 
     */
    public function getUpdatedOn() {
        return $this->updatedOn;
    }

    /**
     * Set ldap
     *
     * @param \SIGE\SecurityManagerBundle\Entity\AuthType $ldap
     * @return Usuario
     */
    public function setLdap(\SIGE\SecurityManagerBundle\Entity\LdapConnections $ldap = null) {
        $this->ldap = $ldap;

        return $this;
    }

    /**
     * Get ldap
     *
     * @return \SIGE\SecurityManagerBundle\Entity\LdapConnections 
     */
    public function getLdap() {
        return $this->ldap;
    }

    /**
     * Set dn
     *
     * @param string $dn
     * @return Usuario
     */
    public function setDn($dn) {
        $this->dn = $dn;

        return $this;
    }

    /**
     * Get dn
     *
     * @return string 
     */
    public function getDn() {
        return $this->dn;
    }

    /**
     * Set online
     *
     * @param integer $online
     * @return Usuario
     */
    public function setOnline($online) {
        $this->online = $online;

        return $this;
    }

    /**
     * Get online
     *
     * @return integer 
     */
    public function getOnline() {
        return $this->online;
    }

    /**
     * Set lastAction
     *
     * @param \DateTime $lastAction
     * @return Usuario
     */
    public function setLastAction($lastAction) {
        $this->lastAction = $lastAction;

        return $this;
    }

    /**
     * Get lastAction
     *
     * @return \DateTime 
     */
    public function getLastAction() {
        return $this->lastAction;
    }

    /**
     * Get authType
     *
     * @return \SIGE\SecurityManagerBundle\Entity\AuthType 
     */
    public function getAuthType() {
        return $this->authType;
    }

    /**
     * Set userProfile
     *
     * @param \SIGE\SecurityManagerBundle\Entity\UserProfile $userProfile
     * @return Usuario
     */
    public function setUserProfile(\SIGE\SecurityManagerBundle\Entity\UserProfile $userProfile = null) {
        $this->userProfile = $userProfile;
        $userProfile->setUser($this);
        return $this;
    }

    /**
     * Get userProfile
     *
     * @return \SIGE\SecurityManagerBundle\Entity\UserProfile 
     */
    public function getUserProfile() {
        return $this->userProfile;
    }

    /**
     * Get ipAddress
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIpAddress() {
        return $this->ipAddress;
    }

    /**
     * Add oldPassword
     *
     * @param \SIGE\SecurityManagerBundle\Entity\OldPassword $oldPassword
     * @return Usuario
     */
    public function addOldPassword(\SIGE\SecurityManagerBundle\Entity\OldPassword $oldPassword) {
        $this->oldPassword[] = $oldPassword;

        return $this;
    }

    /**
     * Remove oldPassword
     *
     * @param \SIGE\SecurityManagerBundle\Entity\OldPassword $oldPassword
     */
    public function removeOldPassword(\SIGE\SecurityManagerBundle\Entity\OldPassword $oldPassword) {
        $this->oldPassword->removeElement($oldPassword);
    }

    /**
     * Get oldPassword
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOldPassword() {
        return $this->oldPassword;
    }

    public function addPermiso(\SIGE\SecurityManagerBundle\Entity\Permiso $permiso) {
        $permiso->setUser($this);
        $this->permisos[] = $permiso;
        return $this;
    }

    public function removePermiso(\SIGE\SecurityManagerBundle\Entity\Permiso $permiso) {
        $this->permisos->removeElement($permiso);
    }

    /**
     * Add roles
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Rol $roles
     * @return Usuario
     */
    public function addRole(\SIGE\SecurityManagerBundle\Entity\Rol $roles) {
        $this->roles[] = $roles;
        return $this;
    }

    /**
     * Remove roles
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Rol $roles
     */
    public function removeRole(\SIGE\SecurityManagerBundle\Entity\Rol $roles) {
        $this->roles->removeElement($roles);
    }

    /**
     * Get roles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRoles() {
        return $this->roles;
    }

    public function getArrayRoles() {
        $allRoles = array();
        foreach ($this->roles as $rol) {
            $allRoles[] = $rol->getNombredescriptivo();
        }
        return $allRoles;
    }

    public function __toString() {
        
    }

    public function eraseCredentials() {
        
    }

    public function getSalt() {
        return null;
    }

    /**
     * Get permisos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPermisos() {
        return $this->permisos;
    }

    /**
     * Add ipAddress
     *
     * @param \SIGE\SecurityManagerBundle\Entity\IpAddress $ipAddress
     * @return Usuario
     */
    public function addIpAddres(\SIGE\SecurityManagerBundle\Entity\IpAddress $ipAddress) {
        $ipAddress->setUser($this);
        $this->ipAddress[] = $ipAddress;

        return $this;
    }

    /**
     * Remove ipAddress
     *
     * @param \SIGE\SecurityManagerBundle\Entity\IpAddress $ipAddress
     */
    public function removeIpAddres(\SIGE\SecurityManagerBundle\Entity\IpAddress $ipAddress) {
        $this->ipAddress->removeElement($ipAddress);
    }

    /**
     * Set authType
     *
     * @param \SIGE\SecurityManagerBundle\Entity\AuthType $authType
     * @return Usuario
     */
    public function setAuthType(\SIGE\SecurityManagerBundle\Entity\AuthType $authType = null) {
        $this->authType = $authType;
        return $this;
    }
    
    //Metodo auxiliar para permisos a recursos
    public function hasPermission($resource, $action,$security) {
        if ($this->id == 1 || $security) {
            return true;
        }
        foreach ($this->permisos as $permiso) {
            if ($permiso->getNomenclador()->getNombreNomenclador() == $resource && $permiso->getAccion()->getId() == $action) {
                return true;
            }
        }
        return false;
    }
    

    /**
     * Set token
     *
     * @param string $token
     * @return Usuario
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Add ipAddress
     *
     * @param \SIGE\SecurityManagerBundle\Entity\IpAddress $ipAddress
     * @return Usuario
     */
    public function addIpAddress(\SIGE\SecurityManagerBundle\Entity\IpAddress $ipAddress)
    {
        $this->ipAddress[] = $ipAddress;

        return $this;
    }

    /**
     * Remove ipAddress
     *
     * @param \SIGE\SecurityManagerBundle\Entity\IpAddress $ipAddress
     */
    public function removeIpAddress(\SIGE\SecurityManagerBundle\Entity\IpAddress $ipAddress)
    {
        $this->ipAddress->removeElement($ipAddress);
    }
}
