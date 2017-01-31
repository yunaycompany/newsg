<?php

/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\SecurityManagerBundle\Model;

use SIGE\SigeBundle\HandlerRest\ClassInterface;

Interface UsuarioInterface extends ClassInterface {

    public function setId($id);

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId();

    /**
     * Set username
     *
     * @param string $username
     * @return Usuario
     */
    public function setUsername($username);

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername();

    /**
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password);

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword();

    /**
     * Set name
     *
     * @param string $name
     * @return Usuario
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string 
     */
    public function getName();

    /**
     * Set surname
     *
     * @param string $surname
     * @return Usuario
     */
    public function setSurname($surname);

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname();

    /**
     * Set email
     *
     * @param string $email
     * @return Usuario
     */
    public function setEmail($email);

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail();

    /**
     * Set status
     *
     * @param integer $status
     * @return Usuario
     */
    public function setStatus($status);

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus();

    /**
     * Set updatedOn
     *
     * @param \DateTime $updatedOn
     * @return Usuario
     */
    public function setUpdatedOn($updatedOn);

    /**
     * Get updatedOn
     *
     * @return \DateTime 
     */
    public function getUpdatedOn();

    /**
     * Set ldap
     *
     * @param integer $ldap
     * @return Usuario
     */
    public function setLdap(\SIGE\SecurityManagerBundle\Entity\LdapConnections $ldap = null);

    /**
     * Get ldap
     *
     * @return integer 
     */
    public function getLdap();

    /**
     * Set dn
     *
     * @param integer $dn
     * @return Usuario
     */
    public function setDn($dn);

    /**
     * Get dn
     *
     * @return integer 
     */
    public function getDn();

    /**
     * Set online
     *
     * @param integer $online
     * @return Usuario
     */
    public function setOnline($online);

    /**
     * Get online
     *
     * @return integer 
     */
    public function getOnline();

    /**
     * Set lastAction
     *
     * @param \DateTime $lastAction
     * @return Usuario
     */
    public function setLastAction($lastAction);

    /**
     * Get lastAction
     *
     * @return \DateTime 
     */
    public function getLastAction();

  /**
     * Set authType
     *
     * @param \SIGE\SecurityManagerBundle\Entity\AuthType $authType
     * @return Usuario
     */
    public function setAuthType(\SIGE\SecurityManagerBundle\Entity\AuthType $authType = null);

    /**
     * Get authType
     *
     * @return AuthType
     */
    public function getAuthType();

    /**
     * Set userProfile
     *
     * @param \SIGE\SecurityManagerBundle\Entity\UserProfile $userProfile
     * @return Usuario
     */
    public function setUserProfile(\SIGE\SecurityManagerBundle\Entity\UserProfile $userProfile = null);


    public function addIpAddres(\SIGE\SecurityManagerBundle\Entity\IpAddress $ipAddress);

    public function removeIpAddres(\SIGE\SecurityManagerBundle\Entity\IpAddress $ipAddress);

    /**
     * Add oldPassword
     *
     * @param \SIGE\SecurityManagerBundle\Entity\OldPassword $oldPassword
     * @return Usuario
     */
    public function addOldPassword(\SIGE\SecurityManagerBundle\Entity\OldPassword $oldPassword);

    /**
     * Remove oldPassword
     *
     * @param \SIGE\SecurityManagerBundle\Entity\OldPassword $oldPassword
     */
    public function removeOldPassword(\SIGE\SecurityManagerBundle\Entity\OldPassword $oldPassword);

    /**
     * Get userProfile
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserProfile();

    /**
     * Get ipAddress
     *
     * @return \SIGE\SecurityManagerBundle\Entity\IpAddress 
     */
    public function getIpAddress();

    /**
     * Get oldPassword
     *
     * @return \SIGE\SecurityManagerBundle\Entity\IpAddress 
     */
    public function getOldPassword();

    /**
     * Add roles
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Rol $roles
     * @return Usuario
     */
    public function addRole(\SIGE\SecurityManagerBundle\Entity\Rol $roles);

    /**
     * Remove roles
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Rol $roles
     */
    public function removeRole(\SIGE\SecurityManagerBundle\Entity\Rol $roles);

    /**
     * Get roles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRoles();

    public function addPermiso(\SIGE\SecurityManagerBundle\Entity\Permiso $permiso);

    public function removePermiso(\SIGE\SecurityManagerBundle\Entity\Permiso $permiso);
}
