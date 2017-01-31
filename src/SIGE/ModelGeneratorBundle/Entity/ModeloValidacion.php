<?php

namespace SIGE\ModelGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModeloValidacion
 *
 * @ORM\Table(name="mod_sige.tbmodelo_validacion")
 * @ORM\Entity(repositoryClass="SIGE\ModelGeneratorBundle\Repository\ModeloValidacionRepository")
 */
class ModeloValidacion
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
     * @ORM\ManyToOne(targetEntity="SIGE\DataEntryBundle\Entity\Modelo", inversedBy="validaciones")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="idnummodelo", referencedColumnName="idnummodelo"),
     *      @ORM\JoinColumn(name="idsubnummodelo", referencedColumnName="idsubnummodelo"),
     *      @ORM\JoinColumn(name="idcodcentroinformante", referencedColumnName="codcentroinformante"),
     *      @ORM\JoinColumn(name="idcodvariante", referencedColumnName="idcodvariante"),
     *      @ORM\JoinColumn(name="idfechadelinformeacumulado", referencedColumnName="fechadelinformeacumulado")
     * })
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="codfilascaptadas", type="string", length=255)
     */
    private $codfilascaptadas;

    /**
     * @var string
     *
     * @ORM\Column(name="xmlvalidacion", type="string", length=255)
     */
    private $xmlvalidacion;

    /**
     * @var string
     *
     * @ORM\Column(name="erroresvalidacion", type="string", length=255)
     */
    private $erroresvalidacion;

    /**
     * @var string
     *
     * @ORM\Column(name="alertasvalidacion", type="string", length=255)
     */
    private $alertasvalidacion;

    /**
     * @var string
     *
     * @ORM\Column(name="filasnocaptadas", type="string", length=255)
     */
    private $filasnocaptadas;

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return ModeloValidacion
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
     * Set descriptor
     *
     * @param string $descriptor
     * @return ModeloValidacion
     */
    public function setDescriptor($descriptor)
    {
        $this->descriptor = $descriptor;

        return $this;
    }

    /**
     * Set codfilascaptadas
     *
     * @param string $codfilascaptadas
     * @return ModeloValidacion
     */
    public function setCodfilascaptadas($codfilascaptadas)
    {
        $this->codfilascaptadas = $codfilascaptadas;

        return $this;
    }

    /**
     * Get codfilascaptadas
     *
     * @return string 
     */
    public function getCodfilascaptadas()
    {
        return $this->codfilascaptadas;
    }

    /**
     * Set xmlvalidacion
     *
     * @param string $xmlvalidacion
     * @return ModeloValidacion
     */
    public function setXmlvalidacion($xmlvalidacion)
    {
        $this->xmlvalidacion = $xmlvalidacion;

        return $this;
    }

    /**
     * Get xmlvalidacion
     *
     * @return string 
     */
    public function getXmlvalidacion()
    {
        return $this->xmlvalidacion;
    }

    /**
     * Set erroresvalidacion
     *
     * @param string $erroresvalidacion
     * @return ModeloValidacion
     */
    public function setErroresvalidacion($erroresvalidacion)
    {
        $this->erroresvalidacion = $erroresvalidacion;

        return $this;
    }

    /**
     * Get erroresvalidacion
     *
     * @return string 
     */
    public function getErroresvalidacion()
    {
        return $this->erroresvalidacion;
    }

    /**
     * Set alertasvalidacion
     *
     * @param string $alertasvalidacion
     * @return ModeloValidacion
     */
    public function setAlertasvalidacion($alertasvalidacion)
    {
        $this->alertasvalidacion = $alertasvalidacion;

        return $this;
    }

    /**
     * Get alertasvalidacion
     *
     * @return string 
     */
    public function getAlertasvalidacion()
    {
        return $this->alertasvalidacion;
    }

    /**
     * Set filasnocaptadas
     *
     * @param string $filasnocaptadas
     * @return ModeloValidacion
     */
    public function setFilasnocaptadas($filasnocaptadas)
    {
        $this->filasnocaptadas = $filasnocaptadas;

        return $this;
    }

    /**
     * Get filasnocaptadas
     *
     * @return string 
     */
    public function getFilasnocaptadas()
    {
        return $this->filasnocaptadas;
    }

    /**
     * Set modelo
     *
     * @param \SIGE\DataEntryBundle\Entity\Modelo $modelo
     * @return ModeloValidacion
     */
    public function setModelo(\SIGE\DataEntryBundle\Entity\Modelo $modelo = null)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return \SIGE\DataEntryBundle\Entity\Modelo 
     */
    public function getModelo()
    {
        return $this->modelo;
    }
}
