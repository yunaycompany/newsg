<?php

namespace SIGE\SecurityManagerBundle\Entity;

use SIGE\SecurityManagerBundle\Model\IpAddressInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Exclude;

/**
 * IpAddress
 *
 * @ORM\Table(name="mod_seguridad.tbipaddress")
 * @ORM\Entity(repositoryClass="SIGE\SecurityManagerBundle\Repository\IpAddressRepository")
 */
class IpAddress implements IpAddressInterface {

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
     * @ORM\Column(name="ip", type="string", length=20, nullable=true)
     * @Assert\Ip
     */
    private $ip;

    /**
     * @var int
     *
     * @ORM\Column(name="active", type="smallint", length=5)
     * @Assert\NotBlank()
     * @Assert\Regex(pattern="/\d/", match=true)
     */
    private $active;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\SecurityManagerBundle\Entity\Usuario", inversedBy="ipAddress")
     * @ORM\JoinColumn(name="iduser", referencedColumnName="id")
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
     * @return IpAddress
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
     * Set ip
     *
     * @param string $ip
     * @return IpAddress
     */
    public function setIp($ip) {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp() {
        return $this->ip;
    }

    /**
     * Set active
     *
     * @param integer $active
     * @return IpAddress
     */
    public function setActive($active) {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return integer 
     */
    public function getActive() {
        return $this->active;
    }

    /**
     * Set user
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Usuario $user
     * @return IpAddress
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

    public function validateIpInsideRangeOfIp($str_ip) {
        $str_rango = $this->ip;
        // Extraemos la máscara
        list($str_red, $str_mascara) = array_pad(explode('/', $str_rango), 2, NULL);
        if (is_null($str_mascara)) {
            // No se especifica máscara: el rango es una única IP
            $mascara = 0xFFFFFFFF;
        } elseif ((int) $str_mascara == $str_mascara) {
            // La máscara es un entero: es un número de bits
            $mascara = 0xFFFFFFFF << (32 - (int) $str_mascara);
        } else {
            // La máscara está en formato x.x.x.x
            $mascara = ip2long($str_mascara);
        }
        $ip = ip2long($str_ip == '::1' ? '127.0.0.1' : $str_ip);
        $red = ip2long($str_red);
        $inf = $red & $mascara;
        $sup = $red | (~$mascara & 0xFFFFFFFF);

        return $ip >= $inf && $ip <= $sup;
    }

}
