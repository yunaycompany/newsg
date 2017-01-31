<?php

namespace SIGE\RecordsClassifiersBundle\Entity;


use SIGE\RecordsClassifiersBundle\Model\AspectoInterface;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Exclude;

/**
 * Aspecto
 *
 * @ORM\Table(name="mod_sige.tbaspecto")
 * @ORM\Entity(repositoryClass="SIGE\RecordsClassifiersBundle\Repository\AspectoRepository")
 */
class Aspecto implements AspectoInterface {
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=16)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Aspecto", mappedBy="aliassuperior")
     */
    private $children;
    
    /**
     * @ORM\ManyToOne(targetEntity="Aspecto", inversedBy="children")
     * @ORM\JoinColumn(name="idaliassuperior", referencedColumnName="id")
     */
    private $aliassuperior;

    /**
     * @var string
     *
     * @ORM\Column(name="nombredescriptivo", type="string", length=255)
     */
    private $nombredescriptivo;

    /**
     * @var string
     *
     * @ORM\Column(name="notametodologica", type="string", length=255)
     */
    private $notametodologica;

    /**
     * @ORM\ManyToOne(targetEntity="Tematica")
     * @ORM\JoinColumn(name="idtematica", referencedColumnName="id")
     */
    private $tematica;
    
    /**
     * @ORM\ManyToMany(targetEntity="Sistemadeinformacion", mappedBy="indicadores")
     * @Exclude
     */
    private $sistemasdeinformacion;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\ModelGeneratorBundle\Entity\PaginaAspecto", mappedBy="alias", cascade={"remove","persist"})
     */
    private $paginaaspectos;

    /**
     * Set id
     *
     * @param string $id
     *
     * @return Aspecto
     */
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombredescriptivo
     *
     * @param string $nombredescriptivo
     *
     * @return Aspecto
     */
    public function setNombredescriptivo($nombredescriptivo)
    {
        $this->nombredescriptivo = $nombredescriptivo;

        return $this;
    }

    /**
     * Get nombredescriptivo
     *
     * @return string
     */
    public function getNombredescriptivo()
    {
        return $this->nombredescriptivo;
    }

    /**
     * Set notametodologica
     *
     * @param string $notametodologica
     *
     * @return Aspecto
     */
    public function setNotametodologica($notametodologica)
    {
        $this->notametodologica = $notametodologica;

        return $this;
    }

    /**
     * Get notametodologica
     *
     * @return string
     */
    public function getNotametodologica()
    {
        return $this->notametodologica;
    }

    /**
     * Set tematica
     *
     * @param string $tematica
     *
     * @return Aspecto
     */
    public function setTematica($tematica)
    {
        $this->tematica = $tematica;

        return $this;
    }

    /**
     * Get tematica
     *
     * @return string
     */
    public function getTematica()
    {
        return $this->tematica;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add child
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Aspecto $child
     *
     * @return Aspecto
     */
    public function addChild(\SIGE\RecordsClassifiersBundle\Entity\Aspecto $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Aspecto $child
     */
    public function removeChild(\SIGE\RecordsClassifiersBundle\Entity\Aspecto $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set aliassuperior
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Aspecto $aliassuperior
     *
     * @return Aspecto
     */
    public function setAliassuperior(\SIGE\RecordsClassifiersBundle\Entity\Aspecto $aliassuperior = null)
    {
        $this->aliassuperior = $aliassuperior;

        return $this;
    }

    /**
     * Get aliassuperior
     *
     * @return \SIGE\RecordsClassifiersBundle\Entity\Aspecto
     */
    public function getAliassuperior()
    {
        return $this->aliassuperior;
    }

    /**
     * Set sistemadeinformacion
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemadeinformacion
     *
     * @return Aspecto
     */
    public function setSistemadeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemadeinformacion = null)
    {
        $this->sistemadeinformacion = $sistemadeinformacion;

        return $this;
    }

    /**
     * Add sistemasdeinformacion
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemasdeinformacion
     * @return Aspecto
     */
    public function addSistemasdeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemasdeinformacion)
    {
        $this->sistemasdeinformacion[] = $sistemasdeinformacion;

        return $this;
    }

    /**
     * Get sistemasdeinformacion
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSistemasdeinformacion()
    {
        return $this->sistemasdeinformacion;
    }

    /**
     * Remove sistemasdeinformacion
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemasdeinformacion
     */
    public function removeSistemasdeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemasdeinformacion)
    {
        $this->sistemasdeinformacion->removeElement($sistemasdeinformacion);
    }

    /**
     * Add paginaaspectos
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\PaginaAspecto $paginaaspectos
     * @return Aspecto
     */
    public function addPaginaaspecto(\SIGE\ModelGeneratorBundle\Entity\PaginaAspecto $paginaaspectos)
    {
        $this->paginaaspectos[] = $paginaaspectos;

        return $this;
    }

    /**
     * Remove paginaaspectos
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\PaginaAspecto $paginaaspectos
     */
    public function removePaginaaspecto(\SIGE\ModelGeneratorBundle\Entity\PaginaAspecto $paginaaspectos)
    {
        $this->paginaaspectos->removeElement($paginaaspectos);
    }

    /**
     * Get paginaaspectos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPaginaaspectos()
    {
        return $this->paginaaspectos;
    }
}
