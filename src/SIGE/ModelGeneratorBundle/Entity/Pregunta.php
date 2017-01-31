<?php

namespace SIGE\ModelGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pregunta
 *
 * @ORM\Table(name="mod_sige.tbpregunta")
 * @ORM\Entity(repositoryClass="SIGE\ModelGeneratorBundle\Repository\PreguntaRepository")
 */
class Pregunta
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\RecordsClassifiersBundle\Entity\Clasificador", inversedBy="preguntas")
     * @ORM\JoinColumn(name="codclasificador", referencedColumnName="id")
     */
    private $clasificador;

    /**
     * @var int
     *
     * @ORM\Column(name="posiciondelafila", type="integer")
     */
    private $posiciondelafila;

    /**
     * @var string
     *
     * @ORM\Column(name="descripciondelapregunta", type="string", length=255)
     */
    private $descripciondelapregunta;

    /**
     * @var string
     *
     * @ORM\Column(name="notametodologica", type="string", length=255)
     */
    private $notametodologica;

    /**
     * @var string
     *
     * @ORM\Column(name="validacion", type="string", length=255)
     */
    private $validacion;

    /**
     * @var bool
     *
     * @ORM\Column(name="obligatoria", type="boolean")
     */
    private $obligatoria;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\ModelGeneratorBundle\Entity\Seccion", inversedBy="preguntas")
     * @ORM\JoinColumn(name="idseccion", referencedColumnName="id")
     */
    private $seccion;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\ModelGeneratorBundle\Entity\Pregunta", mappedBy="preguntaDerivada")
     */
    private $preguntas;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\ModelGeneratorBundle\Entity\Pregunta", inversedBy="preguntas")
     * @ORM\JoinColumn(name="idpreguntaderivada", referencedColumnName="id")
     */
    private $preguntaDerivada;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\ModelGeneratorBundle\Entity\Pagina", inversedBy="preguntas")
     * @ORM\JoinColumn(name="idnumpagina", referencedColumnName="id")
     */
    private $pagina;

    /**
     * @ORM\ManyToOne(targetEntity="Formadecaptacion")
     * @ORM\JoinColumn(name="idformadecaptacion", referencedColumnName="id")
     */
    private $formadecaptacion;

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
     * Set clasificador
     *
     * @param string $clasificador
     * @return Pregunta
     */
    public function setClasificador($clasificador)
    {
        $this->clasificador = $clasificador;

        return $this;
    }

    /**
     * Get clasificador
     *
     * @return string 
     */
    public function getClasificador()
    {
        return $this->clasificador;
    }

    /**
     * Set posiciondelafila
     *
     * @param integer $posiciondelafila
     * @return Pregunta
     */
    public function setPosiciondelafila($posiciondelafila)
    {
        $this->posiciondelafila = $posiciondelafila;

        return $this;
    }

    /**
     * Get posiciondelafila
     *
     * @return integer 
     */
    public function getPosiciondelafila()
    {
        return $this->posiciondelafila;
    }

    /**
     * Set descripciondelapregunta
     *
     * @param string $descripciondelapregunta
     * @return Pregunta
     */
    public function setDescripciondelapregunta($descripciondelapregunta)
    {
        $this->descripciondelapregunta = $descripciondelapregunta;

        return $this;
    }

    /**
     * Get descripciondelapregunta
     *
     * @return string 
     */
    public function getDescripciondelapregunta()
    {
        return $this->descripciondelapregunta;
    }

    /**
     * Set notametodologica
     *
     * @param string $notametodologica
     * @return Pregunta
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
     * Set validacion
     *
     * @param string $validacion
     * @return Pregunta
     */
    public function setValidacion($validacion)
    {
        $this->validacion = $validacion;

        return $this;
    }

    /**
     * Get validacion
     *
     * @return string 
     */
    public function getValidacion()
    {
        return $this->validacion;
    }

    /**
     * Set obligatoria
     *
     * @param boolean $obligatoria
     * @return Pregunta
     */
    public function setObligatoria($obligatoria)
    {
        $this->obligatoria = $obligatoria;

        return $this;
    }

    /**
     * Get obligatoria
     *
     * @return boolean 
     */
    public function getObligatoria()
    {
        return $this->obligatoria;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Pregunta
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
        $this->preguntas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set seccion
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Seccion $seccion
     * @return Pregunta
     */
    public function setSeccion(\SIGE\ModelGeneratorBundle\Entity\Seccion $seccion = null)
    {
        $this->seccion = $seccion;

        return $this;
    }

    /**
     * Get seccion
     *
     * @return \SIGE\ModelGeneratorBundle\Entity\Seccion 
     */
    public function getSeccion()
    {
        return $this->seccion;
    }

    /**
     * Add preguntas
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Pregunta $preguntas
     * @return Pregunta
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
     * Set preguntaDerivada
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Pregunta $preguntaDerivada
     * @return Pregunta
     */
    public function setPreguntaDerivada(\SIGE\ModelGeneratorBundle\Entity\Pregunta $preguntaDerivada = null)
    {
        $this->preguntaDerivada = $preguntaDerivada;

        return $this;
    }

    /**
     * Get preguntaDerivada
     *
     * @return \SIGE\ModelGeneratorBundle\Entity\Pregunta 
     */
    public function getPreguntaDerivada()
    {
        return $this->preguntaDerivada;
    }

    /**
     * Set pagina
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Pagina $pagina
     * @return Pregunta
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
     * Set formadecaptacion
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Formadecaptacion $formadecaptacion
     * @return Pregunta
     */
    public function setFormadecaptacion(\SIGE\ModelGeneratorBundle\Entity\Formadecaptacion $formadecaptacion = null)
    {
        $this->formadecaptacion = $formadecaptacion;

        return $this;
    }

    /**
     * Get formadecaptacion
     *
     * @return \SIGE\ModelGeneratorBundle\Entity\Formadecaptacion 
     */
    public function getFormadecaptacion()
    {
        return $this->formadecaptacion;
    }
}
