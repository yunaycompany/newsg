<?php

namespace SIGE\ModelGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pagina
 *
 * @ORM\Table(name="mod_sige.tbpagina")
 * @ORM\Entity(repositoryClass="SIGE\ModelGeneratorBundle\Repository\PaginaRepository")
 */
class Pagina {

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
     * @ORM\Column(name="nombredescriptivo", type="string", length=255)
     */
    private $nombredescriptivo;

    /**
     * @var bool
     *
     * @ORM\Column(name="sumadecontrol", type="boolean")
     */
    private $sumadecontrol;

    /**
     * @var string
     *
     * @ORM\Column(name="indicadores", type="string", length=255)
     */
    private $indicadores;

    /**
     * @var string
     *
     * @ORM\Column(name="aspectos", type="string", length=255)
     */
    private $aspectos;

    /**
     * @ORM\ManyToOne(targetEntity="Descriptor")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="idnummodelo", referencedColumnName="idnummodelo"),
     *      @ORM\JoinColumn(name="idsubnummodelo", referencedColumnName="idsubnummodelo")
     * })
     */
    private $descriptor;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\ModelGeneratorBundle\Entity\PaginaAspecto", mappedBy="pagina", cascade={"remove","persist"})
     */
    private $paginaaspectos;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\ModelGeneratorBundle\Entity\Seccion", mappedBy="pagina", cascade={"remove","persist"})
     */
    private $secciones;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\ModelGeneratorBundle\Entity\Pregunta", mappedBy="pagina", cascade={"remove","persist"})
     */
    private $preguntas;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nombredescriptivo
     *
     * @param string $nombredescriptivo
     *
     * @return Pagina
     */
    public function setNombredescriptivo($nombredescriptivo) {
        $this->nombredescriptivo = $nombredescriptivo;

        return $this;
    }

    /**
     * Get nombredescriptivo
     *
     * @return string
     */
    public function getNombredescriptivo() {
        return $this->nombredescriptivo;
    }

    /**
     * Set indicadores
     *
     * @param string $indicadores
     *
     * @return Pagina
     */
    public function setIndicadores($indicadores) {
        $this->indicadores = $indicadores;

        return $this;
    }

    /**
     * Get indicadores
     *
     * @return string
     */
    public function getIndicadores() {
        return $this->indicadores;
    }

    /**
     * Set aspectos
     *
     * @param string $aspectos
     *
     * @return Pagina
     */
    public function setAspectos($aspectos) {
        $this->aspectos = $aspectos;

        return $this;
    }

    /**
     * Get aspectos
     *
     * @return string
     */
    public function getAspectos() {
        return $this->aspectos;
    }

    /**
     * Set sumadecontrol
     *
     * @param boolean $sumadecontrol
     *
     * @return Pagina
     */
    public function setSumadecontrol($sumadecontrol) {
        $this->sumadecontrol = $sumadecontrol;

        return $this;
    }

    /**
     * Get sumadecontrol
     *
     * @return boolean
     */
    public function getSumadecontrol() {
        return $this->sumadecontrol;
    }

    /**
     * Set descriptor
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Descriptor $descriptor
     *
     * @return Pagina
     */
    public function setDescriptor(\SIGE\ModelGeneratorBundle\Entity\Descriptor $descriptor = null) {
        $this->descriptor = $descriptor;

        return $this;
    }

    /**
     * Get descriptor
     *
     * @return \SIGE\ModelGeneratorBundle\Entity\Descriptor
     */
    public function getDescriptor() {
        return $this->descriptor;
    }


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Pagina
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->paginaaspectos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add paginaaspectos
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\PaginaAspecto $paginaaspectos
     * @return Pagina
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

    

    /**
     * Add secciones
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Seccion $secciones
     * @return Pagina
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
     * Add preguntas
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Pregunta $preguntas
     * @return Pagina
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
}
