<?php

namespace SIGE\DataEntryBundle\Entity;

use SIGE\DataEntryBundle\Model\ModeloInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;

/**
 * Modelo
 *
 * @ORM\Table(name="mod_sige.tbmodelo")
 * @ORM\Entity(repositoryClass="SIGE\DataEntryBundle\Repository\ModeloRepository")
 */
class Modelo implements ModeloInterface {

    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="idnummodelo", type="string", length=8)
     */
    private $idnummodelo;

    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="idsubnummodelo", type="string", length=2)
     */
    private $idsubnummodelo;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="SIGE\ModelGeneratorBundle\Entity\Variante")
     * @ORM\JoinColumn(name="idcodvariante", referencedColumnName="id")
     * @ORM\Id
     */
    private $codvariante;

    /**
     * @var string
     *
     * @ORM\Column(name="fechadelinformeacumulado", type="string")
     * @ORM\Id
     */
    private $fechadelinformeacumulado;

    /**
     * @var int
     *
     * @ORM\Column(name="anno", type="integer")
     */
    private $anno;

    /**
     * @var int
     *
     * @ORM\Column(name="mes", type="integer")
     */
    private $mes;

    /**
     * @var int
     *
     * @ORM\Column(name="dia", type="integer")
     */
    private $dia;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\RecordsClassifiersBundle\Entity\Centroinformante")
     * @ORM\JoinColumn(name="codcentroinformante", referencedColumnName="id")
     * @ORM\Id
     */
    private $centroinformante;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadeconfeccion", type="datetime")
     * @Type("DateTime<'Y-m-d'>")
     * @Assert\DateTime()
     */
    private $fechadeconfeccion;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=255)
     */
    private $observaciones;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\SigeBundle\Entity\Estado")
     * @ORM\JoinColumn(name="idestado", referencedColumnName="id")
     */
    private $estado;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\ModelGeneratorBundle\Entity\Acotacionesalmodelo", mappedBy="modelo", cascade={"remove", "persist"})
     * 
     */
    private $acotaciones;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\ModelGeneratorBundle\Entity\ModeloValidacion", mappedBy="modelo", cascade={"remove", "persist"})
     */
    private $validaciones;

    /**
     * Set codvariante
     *
     * @param integer $codvariante
     * @return Modelo
     */
    public function setCodvariante($codvariante) {
        $this->codvariante = $codvariante;

        return $this;
    }

    /**
     * Get codvariante
     *
     * @return integer
     */
    public function getCodvariante() {
        return $this->codvariante;
    }

    /**
     * Set fechadelinformeacumulado
     *
     * @param string $fechadelinformeacumulado
     * @return Modelo
     */
    public function setFechadelinformeacumulado($fechadelinformeacumulado) {
        $this->fechadelinformeacumulado = $fechadelinformeacumulado;

        return $this;
    }

    /**
     * Get fechadelinformeacumulado
     *
     * @return string
     */
    public function getFechadelinformeacumulado() {
        return $this->fechadelinformeacumulado;
    }

    /**
     * Set centroinformante
     *
     * @param string $centroinformante
     * @return Modelo
     */
    public function setCentroinformante($centroinformante) {
        $this->centroinformante = $centroinformante;

        return $this;
    }

    /**
     * Get centroinformante
     *
     * @return string
     */
    public function getCentroinformante() {
        return $this->centroinformante;
    }

    /**
     * Set fechadeconfeccion
     *
     * @param \DateTime $fechadeconfeccion
     * @return Modelo
     */
    public function setFechadeconfeccion($fechadeconfeccion) {
        $this->fechadeconfeccion = $fechadeconfeccion;

        return $this;
    }

    /**
     * Get fechadeconfeccion
     *
     * @return \DateTime
     */
    public function getFechadeconfeccion() {
        return $this->fechadeconfeccion;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Modelo
     */
    public function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string
     */
    public function getObservaciones() {
        return $this->observaciones;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Modelo
     */
    public function setEstado($estado) {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return integer
     */
    public function getEstado() {
        return $this->estado;
    }

    /**
     * Set descriptor
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Descriptor $descriptor
     * @return Modelo
     */
    public function setDescriptor(\SIGE\ModelGeneratorBundle\Entity\Descriptor $descriptor = null) {
        $this->descriptor = $descriptor;

        return $this;
    }

    /**
     * Set acotaciones
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Acotacionesalmodelo $acotaciones
     * @return Modelo
     */
    public function setAcotaciones(\SIGE\ModelGeneratorBundle\Entity\Acotacionesalmodelo $acotaciones = null) {
        $this->acotaciones = $acotaciones;

        return $this;
    }

    /**
     * Get acotaciones
     *
     * @return \SIGE\ModelGeneratorBundle\Entity\Acotacionesalmodelo
     */
    public function getAcotaciones() {
        return $this->acotaciones;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Modelo
     */
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->acotaciones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set anno
     *
     * @param integer $anno
     * @return Modelo
     */
    public function setAnno($anno) {
        $this->anno = $anno;

        return $this;
    }

    /**
     * Get anno
     *
     * @return integer
     */
    public function getAnno() {
        return $this->anno;
    }

    /**
     * Set mes
     *
     * @param integer $mes
     * @return Modelo
     */
    public function setMes($mes) {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get mes
     *
     * @return integer
     */
    public function getMes() {
        return $this->mes;
    }

    /**
     * Set dia
     *
     * @param integer $dia
     * @return Modelo
     */
    public function setDia($dia) {
        $this->dia = $dia;

        return $this;
    }

    /**
     * Get dia
     *
     * @return integer
     */
    public function getDia() {
        return $this->dia;
    }

    /**
     * Add acotaciones
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Acotacionesalmodelo $acotaciones
     * @return Modelo
     */
    public function addAcotacione(\SIGE\ModelGeneratorBundle\Entity\Acotacionesalmodelo $acotaciones) {
        $this->acotaciones[] = $acotaciones;

        return $this;
    }

    /**
     * Remove acotaciones
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Acotacionesalmodelo $acotaciones
     */
    public function removeAcotacione(\SIGE\ModelGeneratorBundle\Entity\Acotacionesalmodelo $acotaciones) {
        $this->acotaciones->removeElement($acotaciones);
    }

    /**
     * Set idnummodelo
     *
     * @param string $idnummodelo
     * @return Modelo
     */
    public function setIdnummodelo($idnummodelo) {
        $this->idnummodelo = $idnummodelo;

        return $this;
    }

    /**
     * Get idnummodelo
     *
     * @return string
     */
    public function getIdnummodelo() {
        return $this->idnummodelo;
    }

    /**
     * Set idsubnummodelo
     *
     * @param string $idsubnummodelo
     * @return Modelo
     */
    public function setIdsubnummodelo($idsubnummodelo) {
        $this->idsubnummodelo = $idsubnummodelo;

        return $this;
    }

    /**
     * Get idsubnummodelo
     *
     * @return string
     */
    public function getIdsubnummodelo() {
        return $this->idsubnummodelo;
    }

    /**
     * Add validaciones
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\ModeloValidacion $validaciones
     * @return Modelo
     */
    public function addValidacione(\SIGE\ModelGeneratorBundle\Entity\ModeloValidacion $validaciones) {
        $this->validaciones[] = $validaciones;

        return $this;
    }

    /**
     * Remove validaciones
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\ModeloValidacion $validaciones
     */
    public function removeValidacione(\SIGE\ModelGeneratorBundle\Entity\ModeloValidacion $validaciones) {
        $this->validaciones->removeElement($validaciones);
    }

    /**
     * Get validaciones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getValidaciones() {
        return $this->validaciones;
    }

}
