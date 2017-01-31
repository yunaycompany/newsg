<?php

namespace SIGE\ModelGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seccion
 *
 * @ORM\Table(name="mod_sige.tbseccion")
 * @ORM\Entity(repositoryClass="SIGE\ModelGeneratorBundle\Repository\SeccionRepository")
 */
class Seccion {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var int
     *
     * @ORM\Column(name="posiciondelafila2", type="integer")
     */
    private $posiciondelafila;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="superior", type="string", length=20)
     */
    private $superior;

    /**
     * @var int
     *
     * @ORM\Column(name="nivel2", type="integer")
     */
    private $nivel;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\ModelGeneratorBundle\Entity\Pagina", inversedBy="secciones")
     * @ORM\JoinColumn(name="idnumpagina", referencedColumnName="id")
     */
    private $pagina;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\ModelGeneratorBundle\Entity\Pregunta", mappedBy="seccion", cascade={"remove","persist"})
     */
    private $preguntas;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\ModelGeneratorBundle\Entity\Seccion", mappedBy="seccionSuperior")
     */
    private $secciones;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\ModelGeneratorBundle\Entity\Seccion", inversedBy="secciones")
     * @ORM\JoinColumn(name="idseccionsuperior", referencedColumnName="id")
     */
    private $seccionSuperior;

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Seccion
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
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Seccion
     */
    public function setTitulo($titulo) {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo() {
        return $this->titulo;
    }

    /**
     * Set posiciondelafila
     *
     * @param integer $posiciondelafila
     *
     * @return Seccion
     */
    public function setPosiciondelafila($posiciondelafila) {
        $this->posiciondelafila = $posiciondelafila;

        return $this;
    }

    /**
     * Get posiciondelafila
     *
     * @return integer
     */
    public function getPosiciondelafila() {
        return $this->posiciondelafila;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Seccion
     */
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion() {
        return $this->descripcion;
    }

    /**
     * Set superior
     *
     * @param string $superior
     *
     * @return Seccion
     */
    public function setSuperior($superior) {
        $this->superior = $superior;

        return $this;
    }

    /**
     * Get superior
     *
     * @return string
     */
    public function getSuperior() {
        return $this->superior;
    }

    /**
     * Set nivel
     *
     * @param integer $nivel
     *
     * @return Seccion
     */
    public function setNivel($nivel) {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return integer
     */
    public function getNivel() {
        return $this->nivel;
    }


    /**
     * Set pagina
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Pagina $pagina
     *
     * @return Seccion
     */
    public function setPagina(\SIGE\ModelGeneratorBundle\Entity\Pagina $pagina = null)
    {
        $this->pagina = $pagina;

        return $this;
    }

    /**
     * Get pagina
     *
     * @return \SIGE\ModelGeneratorBundle\Entity\Pagina
     */
    public function getPagina()
    {
        return $this->pagina;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->preguntas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->secciones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add preguntas
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Pregunta $preguntas
     * @return Seccion
     */
    public function addPregunta(\SIGE\ModelGeneratorBundle\Entity\Pregunta $preguntas)
    {
        $this->preguntas[] = $preguntas;

        return $this;
    }

    /**
     * Remove preguntas
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Pregunta $preguntas
     */
    public function removePregunta(\SIGE\ModelGeneratorBundle\Entity\Pregunta $preguntas)
    {
        $this->preguntas->removeElement($preguntas);
    }

    /**
     * Get preguntas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPreguntas()
    {
        return $this->preguntas;
    }

    /**
     * Add secciones
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Seccion $secciones
     * @return Seccion
     */
    public function addSeccione(\SIGE\ModelGeneratorBundle\Entity\Seccion $secciones)
    {
        $this->secciones[] = $secciones;

        return $this;
    }

    /**
     * Remove secciones
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Seccion $secciones
     */
    public function removeSeccione(\SIGE\ModelGeneratorBundle\Entity\Seccion $secciones)
    {
        $this->secciones->removeElement($secciones);
    }

    /**
     * Get secciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSecciones()
    {
        return $this->secciones;
    }

    /**
     * Set seccionSuperior
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Seccion $seccionSuperior
     * @return Seccion
     */
    public function setSeccionSuperior(\SIGE\ModelGeneratorBundle\Entity\Seccion $seccionSuperior = null)
    {
        $this->seccionSuperior = $seccionSuperior;

        return $this;
    }

    /**
     * Get seccionSuperior
     *
     * @return \SIGE\ModelGeneratorBundle\Entity\Seccion 
     */
    public function getSeccionSuperior()
    {
        return $this->seccionSuperior;
    }
}
