<?php

namespace SIGE\RecordsClassifiersBundle\Entity;

use SIGE\RecordsClassifiersBundle\Model\PiedefirmaInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Piedefirma
 *
 * @ORM\Table(name="mod_sige.tbpiedefirma")
 * @ORM\Entity(repositoryClass="SIGE\RecordsClassifiersBundle\Repository\PiedefirmaRepository")
 */
class Piedefirma implements PiedefirmaInterface {

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
     * @ORM\Column(name="denominaciondelpie", type="string", length=50)
     * @Assert\NotBlank(message = "Por favor, escriba la denominación del pie.")
     * @Assert\Length(max=50)
     */
    private $denominaciondelpie;

    /**
     * @var string
     *
     * @ORM\Column(name="primercargo", type="string", length=255)
     * @Assert\NotBlank(message = "Por favor, escriba el nombre de la persona que ocupa el primer cargo.")
     * @Assert\Length(max=255)
     */
    private $primercargo;

    /**
     * @var string
     *
     * @ORM\Column(name="segundocargo", type="string", length=255)
     * @Assert\NotBlank(message = "Por favor, escriba el nombre de la persona que ocupa el segundo cargo.")
     * @Assert\Length(max=255)
     */
    private $segundocargo;

    /**
     * @var string
     *
     * @ORM\Column(name="notadecertificacion", type="string", length=255)
     * @Assert\NotBlank(message = "Por favor, escriba la nota de certificacion.")
     * @Assert\Length(max=255)
     */
    private $notadecertificacion;

    /**
     * @ORM\ManyToOne(targetEntity="Sistemadeinformacion")
     * @ORM\JoinColumn(name="idsistemadeinformacion", referencedColumnName="id")
     */
    private $sistemadeinformacion;    
    
    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Piedefirma
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
     * Set denominaciondelpie
     *
     * @param string $denominaciondelpie
     *
     * @return Piedefirma
     */
    public function setDenominaciondelpie($denominaciondelpie)
    {
        $this->denominaciondelpie = $denominaciondelpie;

        return $this;
    }

    /**
     * Get denominaciondelpie
     *
     * @return string
     */
    public function getDenominaciondelpie()
    {
        return $this->denominaciondelpie;
    }

    /**
     * Set primercargo
     *
     * @param string $primercargo
     *
     * @return Piedefirma
     */
    public function setPrimercargo($primercargo)
    {
        $this->primercargo = $primercargo;

        return $this;
    }

    /**
     * Get primercargo
     *
     * @return string
     */
    public function getPrimercargo()
    {
        return $this->primercargo;
    }

    /**
     * Set segundocargo
     *
     * @param string $segundocargo
     *
     * @return Piedefirma
     */
    public function setSegundocargo($segundocargo)
    {
        $this->segundocargo = $segundocargo;

        return $this;
    }

    /**
     * Get segundocargo
     *
     * @return string
     */
    public function getSegundocargo()
    {
        return $this->segundocargo;
    }

    /**
     * Set notadecertificacion
     *
     * @param string $notadecertificacion
     *
     * @return Piedefirma
     */
    public function setNotadecertificacion($notadecertificacion)
    {
        $this->notadecertificacion = $notadecertificacion;

        return $this;
    }

    /**
     * Get notadecertificacion
     *
     * @return string
     */
    public function getNotadecertificacion()
    {
        return $this->notadecertificacion;
    }

    /**
     * Set sistemadeinformacion
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemadeinformacion
     *
     * @return Piedefirma
     */
    public function setSistemadeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemadeinformacion = null)
    {
        $this->sistemadeinformacion = $sistemadeinformacion;

        return $this;
    }

    /**
     * Get sistemadeinformacion
     *
     * @return \SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion
     */
    public function getSistemadeinformacion()
    {
        return $this->sistemadeinformacion;
    }
}
