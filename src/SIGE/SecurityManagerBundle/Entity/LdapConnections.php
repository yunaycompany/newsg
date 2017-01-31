<?php

namespace SIGE\SecurityManagerBundle\Entity;

use SIGE\SecurityManagerBundle\Model\LdapConnectionsInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Exclude;

/**
 * LdapConnections
 *
 * @ORM\Table(name="mod_seguridad.tbldapconnections")
 * @ORM\Entity(repositoryClass="SIGE\SecurityManagerBundle\Repository\LdapConnectionsRepository")
 */
class LdapConnections implements LdapConnectionsInterface {

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
     * @ORM\Column(name="ldapname", type="string", length=50)
     * @Assert\NotBlank(message = "El valor del nombre de la conexión ldap no puede ser vacío.")
     * @Assert\Regex(pattern="/\d/", match=false)
     * @Assert\Length(max=50)
     *
     */
    private $ldapname;

    /**
     * @var string
     *
     * @ORM\Column(name="host", type="string", length=50)
     * @Assert\NotBlank(message = "El valor del servidor no puede ser vacío.")     * 
     * @Assert\Length(max=50)
     */
    private $host;

    /**
     * @var integer
     *
     * @ORM\Column(name="port", type="integer", length=10)
     * @Assert\NotBlank(message = "El valor del puerto no puede ser vacío.")
     * 
     */
    private $port;

    /**
     * @var string
     *
     * @ORM\Column(name="account", type="string", length=50, nullable=true)
     * @Assert\NotBlank(message = "El valor de la cuenta no puede ser vacío.")     * 
     * @Assert\Length(max=50)
     * @Assert\Email()
     */
    private $account;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=50, nullable=true)
     * @Assert\NotBlank(message = "El valor de la contraseña no puede ser vacío.")
     * @Assert\Length(max=50)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="basedn", type="string", length=50, nullable=true)
     * @Assert\NotBlank(message = "El valor del DN base no puede ser vacío.")
     * @Assert\Length(max=50)
     *
     */
    private $basedn;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=50)
     * @Assert\NotBlank(message = "El valor del nombre de usuario no puede ser vacío.")
     * @Assert\Length(max=50)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     * @Assert\NotBlank(message = "El valor del nombre no puede ser vacío.")
     * @Assert\Length(max=50)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=50)
     * @Assert\NotBlank(message = "El valor de los apellidos no puede ser vacío.")     
     * @Assert\Length(max=50)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=true)
     * @Assert\NotBlank(message = "El valor del email no puede ser vacío.")
     * @Assert\Length(max=50)
     * 
     */
    private $email;

    /**
     *
     *
     * @ORM\OneToMany(targetEntity="SIGE\SecurityManagerBundle\Entity\Usuario", 
     * mappedBy="ldap", cascade={"remove","persist"})
     * @Exclude
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
     * @return LdapConections
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
     * Set ldapname
     *
     * @param string $ldapname
     * @return LdapConnections
     */
    public function setLdapname($ldapname) {
        $this->ldapname = $ldapname;

        return $this;
    }

    /**
     * Get ldapname
     *
     * @return string 
     */
    public function getLdapname() {
        return $this->ldapname;
    }

    /**
     * Set host
     *
     * @param string $host
     * @return LdapConnections
     */
    public function setHost($host) {
        $this->host = $host;

        return $this;
    }

    /**
     * Get host
     *
     * @return string 
     */
    public function getHost() {
        return $this->host;
    }

    /**
     * Set port
     *
     * @param integer $port
     * @return LdapConnections
     */
    public function setPort($port) {
        $this->port = $port;

        return $this;
    }

    /**
     * Get port
     *
     * @return integer
     */
    public function getPort() {
        return $this->port;
    }

    /**
     * Set account
     *
     * @param string $account
     * @return LdapConnections
     */
    public function setAccount($account) {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return string 
     */
    public function getAccount() {
        return $this->account;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return LdapConnections
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
     * Set basedn
     *
     * @param string $basedn
     * @return LdapConnections
     */
    public function setBasedn($basedn) {
        $this->basedn = $basedn;

        return $this;
    }

    /**
     * Get basedn
     *
     * @return string 
     */
    public function getBasedn() {
        return $this->basedn;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return LdapConnections
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
     * Set name
     *
     * @param string $name
     * @return LdapConnections
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
     * @return LdapConnections
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
     * @return LdapConnections
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
     * Add user
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Usuario $user
     * @return LdapConnections
     */
    public function addUser(\SIGE\SecurityManagerBundle\Entity\Usuario $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Usuario $user
     */
    public function removeUser(\SIGE\SecurityManagerBundle\Entity\Usuario $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }
}
