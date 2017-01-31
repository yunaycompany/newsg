<?php

namespace SIGE\ModelGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dependencia
 *
 * @ORM\Table(name="mod_sige.tbdependencia")
 * @ORM\Entity(repositoryClass="SIGE\ModelGeneratorBundle\Repository\DependenciaRepository")
 */
class Dependencia
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Pregunta")
     *      @ORM\JoinColumn(name="idpreguntaref", referencedColumnName="id")
     */
    private $idpreguntaref;

    /**
     * @var string
     *
     * @ORM\Column(name="respuesta", type="string", length=255)
     */
    private $respuesta;


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
     * Set idpreguntaref
     *
     * @param string $idpreguntaref
     * @return Dependencia
     */
    public function setIdpreguntaref($idpreguntaref)
    {
        $this->idpreguntaref = $idpreguntaref;

        return $this;
    }

    /**
     * Get idpreguntaref
     *
     * @return string 
     */
    public function getIdpreguntaref()
    {
        return $this->idpreguntaref;
    }

    /**
     * Set idnummodelo
     *
     * @param string $idnummodelo
     * @return Dependencia
     */
    public function setIdnummodelo($idnummodelo)
    {
        $this->idnummodelo = $idnummodelo;

        return $this;
    }

    /**
     * Set idsubnummodelo
     *
     * @param string $idsubnummodelo
     * @return Dependencia
     */
    public function setIdsubnummodelo($idsubnummodelo)
    {
        $this->idsubnummodelo = $idsubnummodelo;

        return $this;
    }

    /**
     * Set numpagina
     *
     * @param integer $numpagina
     * @return Dependencia
     */
    public function setNumpagina($numpagina)
    {
        $this->numpagina = $numpagina;

        return $this;
    }

    /**
     * Set respuesta
     *
     * @param string $respuesta
     * @return Dependencia
     */
    public function setRespuesta($respuesta)
    {
        $this->respuesta = $respuesta;

        return $this;
    }

    /**
     * Get respuesta
     *
     * @return string 
     */
    public function getRespuesta()
    {
        return $this->respuesta;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Dependencia
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
