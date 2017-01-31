<?php

namespace SIGE\RecordsClassifiersBundle\Entity;


use SIGE\RecordsClassifiersBundle\Model\CentroinformanteInterface;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
/**
 * Centroinformante
 *
 * @ORM\Table(name="mod_sige.tbcentroinformante")
 * @ORM\Entity(repositoryClass="SIGE\RecordsClassifiersBundle\Repository\CentroinformanteRepository")
 */
class Centroinformante implements CentroinformanteInterface {

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string")
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
     * @ORM\ManyToOne(targetEntity="SIGE\SigeBundle\Entity\Estado")
     * @ORM\JoinColumn(name="idestado", referencedColumnName="id")
     */
    private $estado;

    /**
     * @ORM\OneToMany(targetEntity="CentroinformanteEstado", mappedBy="centroinformante")
     */
    private $historial_estados;

    /**
     * @ORM\ManyToOne(targetEntity="Sistemadeinformacion")
     * @ORM\JoinColumn(name="idsistemadeinformacion", referencedColumnName="id")
     * @Exclude
     */
    private $sistemadeinformacion;

    /**
     * @ORM\ManyToOne(targetEntity="Registro", inversedBy="centrosinformantes")
     * @ORM\JoinColumn(name="idregistro", referencedColumnName="id")
     */
    private $registro;

    /**
     * @ORM\OneToMany(targetEntity="ClasificacionCentroInformante", mappedBy="centroinformante")
     */
    private $clasificaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="fechadecreacion", type="string", length=255)
     */
    private $fechadecreacion;

    /**
     * @ORM\ManyToOne(targetEntity="Ome", inversedBy="centrosinformantes")
     * @ORM\JoinColumn(name="idcodome", referencedColumnName="id")
     */
    private $codome;

    /**
     * @ORM\ManyToOne(targetEntity="Ote", inversedBy="centrosinformantes")
     * @ORM\JoinColumn(name="idcodote", referencedColumnName="id")
     */
    private $codote;

    /**
     * @var string
     *
     * @ORM\Column(name="detalles", type="string", length=255)
     */
    private $detalles;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=255)
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="longitud", type="string", length=255)
     */
    private $longitud;

    /**
     * @var string
     *
     * @ORM\Column(name="latitud", type="string", length=255)
     */
    private $latitud;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\DataEntryBundle\Entity\Encuesta", mappedBy="centroinformante")
     * @ORM\JoinColumn(name="idencuesta", referencedColumnName="id")
     */
    private $encuestas;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\ModelGeneratorBundle\Entity\RolCentroInformante", mappedBy="centroInformante")
     */
    private $roles;


    /**
     * Constructor
     */
    public function __construct() {
        $this->clasificaciones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->roles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->historial_estados = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Centroinformante
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
     * Set nombredescriptivo
     *
     * @param string $nombredescriptivo
     *
     * @return Centroinformante
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
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Centroinformante
     */
    public function setDireccion($direccion) {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion() {
        return $this->direccion;
    }

    /**
     * Set fechadecreacion
     *
     * @param string $fechadecreacion
     *
     * @return Centroinformante
     */
    public function setFechadecreacion($fechadecreacion) {
        $this->fechadecreacion = $fechadecreacion;

        return $this;
    }

    /**
     * Get fechadecreacion
     *
     * @return string
     */
    public function getFechadecreacion() {
        return $this->fechadecreacion;
    }

    /**
     * Set detalles
     *
     * @param string $detalles
     *
     * @return Centroinformante
     */
    public function setDetalles($detalles) {
        $this->detalles = $detalles;

        return $this;
    }

    /**
     * Get detalles
     *
     * @return string
     */
    public function getDetalles() {
        return $this->detalles;
    }

    /**
     * Set correo
     *
     * @param string $correo
     *
     * @return Centroinformante
     */
    public function setCorreo($correo) {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string
     */
    public function getCorreo() {
        return $this->correo;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Centroinformante
     */
    public function setTelefono($telefono) {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono() {
        return $this->telefono;
    }

    /**
     * Set estado
     *
     * @param \SIGE\SigeBundle\Entity\Estado $estado
     *
     * @return Centroinformante
     */
    public function setEstado(\SIGE\SigeBundle\Entity\Estado $estado = null) {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return \SIGE\SigeBundle\Entity\Estado
     */
    public function getEstado() {
        return $this->estado;
    }

    /**
     * Set sistemadeinformacion
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemadeinformacion
     *
     * @return Centroinformante
     */
    public function setSistemadeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemadeinformacion = null) {
        $this->sistemadeinformacion = $sistemadeinformacion;

        return $this;
    }

    /**
     * Get sistemadeinformacion
     *
     * @return \SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion
     */
    public function getSistemadeinformacion() {
        return $this->sistemadeinformacion;
    }

    /**
     * Set registro
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Registro $registro
     *
     * @return Centroinformante
     */
    public function setRegistro(\SIGE\RecordsClassifiersBundle\Entity\Registro $registro = null) {
        $this->registro = $registro;

        return $this;
    }

    /**
     * Get registro
     *
     * @return \SIGE\RecordsClassifiersBundle\Entity\Registro
     */
    public function getRegistro() {
        return $this->registro;
    }

    /**
     * Set codome
     *
     * @param Ome $codome
     *
     * @return Centroinformante
     */
    public function setCodome(Ome $codome = null) {
        $this->codome = $codome;

        return $this;
    }

    /**
     * Get codome
     *
     * @return Ome
     */
    public function getCodome() {
        return $this->codome;
    }

    /**
     * Add clasificacione
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\ClasificacionCentroInformante $clasificacione
     *
     * @return Centroinformante
     */
    public function addClasificacione(\SIGE\RecordsClassifiersBundle\Entity\ClasificacionCentroInformante $clasificacione) {
        $this->clasificaciones[] = $clasificacione;

        return $this;
    }

    /**
     * Remove clasificacione
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\ClasificacionCentroInformante $clasificacione
     */
    public function removeClasificacione(\SIGE\RecordsClassifiersBundle\Entity\ClasificacionCentroInformante $clasificacione) {
        $this->clasificaciones->removeElement($clasificacione);
    }

    /**
     * Get clasificaciones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClasificaciones() {
        return $this->clasificaciones;
    }

    /**
     * Add historial_estados
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\CentroinformanteEstado $historialEstados
     * @return Centroinformante
     */
    public function addHistorialEstado(\SIGE\RecordsClassifiersBundle\Entity\CentroinformanteEstado $historialEstados) {
        $this->historial_estados[] = $historialEstados;

        return $this;
    }

    /**
     * Remove historial_estados
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\CentroinformanteEstado $historialEstados
     */
    public function removeHistorialEstado(\SIGE\RecordsClassifiersBundle\Entity\CentroinformanteEstado $historialEstados) {
        $this->historial_estados->removeElement($historialEstados);
    }

    /**
     * Get historial_estados
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHistorialEstados() {
        return $this->historial_estados;
    }

    /**
     * Set longitud
     *
     * @param string $longitud
     * @return Centroinformante
     */
    public function setLongitud($longitud) {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get longitud
     *
     * @return string 
     */
    public function getLongitud() {
        return $this->longitud;
    }

    /**
     * Set latitud
     *
     * @param string $latitud
     * @return Centroinformante
     */
    public function setLatitud($latitud) {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get latitud
     *
     * @return string 
     */
    public function getLatitud() {
        return $this->latitud;
    }

    /**
     * Set codote
     *
     * @param Ote $codote
     * @return Centroinformante
     */
    public function setCodote(Ote $codote = null) {
        $this->codote = $codote;

        return $this;
    }

    /**
     * Get codote
     *
     * @return Ote 
     */
    public function getCodote() {
        return $this->codote;
    }


    /**
     * Add encuestas
     *
     * @param \SIGE\DataEntryBundle\Entity\Encuesta $encuestas
     * @return Centroinformante
     */
    public function addEncuesta(\SIGE\DataEntryBundle\Entity\Encuesta $encuestas)
    {
        $this->encuestas[] = $encuestas;

        return $this;
    }

    /**
     * Remove encuestas
     *
     * @param \SIGE\DataEntryBundle\Entity\Encuesta $encuestas
     */
    public function removeEncuesta(\SIGE\DataEntryBundle\Entity\Encuesta $encuestas)
    {
        $this->encuestas->removeElement($encuestas);
    }

    /**
     * Get encuestas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEncuestas()
    {
        return $this->encuestas;
    }

    /**
     * Add roles
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\RolCentroInformante $roles
     * @return Centroinformante
     */
    public function addRole(\SIGE\ModelGeneratorBundle\Entity\RolCentroInformante $roles) {
        $this->roles[] = $roles;

        return $this;
    }

    /**
     * Remove roles
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\RolCentroInformante $roles
     */
    public function removeRole(\SIGE\ModelGeneratorBundle\Entity\RolCentroInformante $roles) {
        $this->roles->removeElement($roles);
    }

    /**
     * Get roles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRoles() {
        return $this->roles;
    }

}
