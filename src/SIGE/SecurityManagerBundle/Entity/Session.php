<?php

namespace SIGE\SecurityManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Session
 *
 * @ORM\Table(name="mod_seguridad.tbsession")
 * @ORM\Entity(repositoryClass="SIGE\SecurityManagerBundle\Repository\SessionRepository")
 */
class Session {

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
     * @ORM\Column(name="sessdata", type="string", length=255, nullable=true)
     */
    private $sessData;

    /**
     * @var string
     *
     * @ORM\Column(name="sesstime", type="string", length=255, nullable=true)
     */
    private $sessTime;

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
     * @return Session
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
     * Set sessData
     *
     * @param string $sessData
     * @return Session
     */
    public function setSessData($sessData) {
        $this->sessData = $sessData;

        return $this;
    }

    /**
     * Get sessData
     *
     * @return string 
     */
    public function getSessData() {
        return $this->sessData;
    }

    /**
     * Set sessTime
     *
     * @param string $sessTime
     * @return Session
     */
    public function setSessTime($sessTime) {
        $this->sessTime = $sessTime;

        return $this;
    }

    /**
     * Get sessTime
     *
     * @return string 
     */
    public function getSessTime() {
        return $this->sessTime;
    }

}
