<?php

namespace SIGE\ModelGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Descriptor
 *
 * @ORM\Table(name="mod_sige.tbdescriptor")
 * @ORM\Entity(repositoryClass="SIGE\ModelGeneratorBundle\Repository\DescriptorRepository")
 */
class Descriptor {

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
     * @ORM\ManyToOne(targetEntity="SIGE\SigeBundle\Entity\Estado")
     * @ORM\JoinColumn(name="idestado", referencedColumnName="id")
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="tipodemodelo", type="string", length=255)
     */
    private $tipodemodelo;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\RecordsClassifiersBundle\Entity\ClasificacionSeguridad")
     * @ORM\JoinColumn(name="idclasificaciondeseguridad", referencedColumnName="id")
     */
    private $clasificaciondeseguridad;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\RecordsClassifiersBundle\Entity\Piedefirma")
     * @ORM\JoinColumn(name="idpiedefirma", referencedColumnName="id")
     */
    private $piedefirma;
    
    /**
     * @var string
     *
     * @ORM\Column(name="notametodologica", type="string", length=255)
     */
    private $notametodologica;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\SigeBundle\Entity\Periodicidad")
     * @ORM\JoinColumn(name="idperiodicidad", referencedColumnName="id")
     */
    private $periodicidad;

    /**
     * @var string
     *
     * @ORM\Column(name="aproximacion", type="string", length=255)
     */
    private $aproximacion;

    /**
     * @var string
     *
     * @ORM\Column(name="nombredescriptivo", type="string", length=255)
     */
    private $nombredescriptivo;

    /**
     * @var string
     *
     * @ORM\Column(name="preguntaidentidad", type="string", length=255, nullable=true)
     */
    private $preguntaidentidad;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion")
     * @ORM\JoinColumn(name="idsistemadeinformacion", referencedColumnName="id")
     */
    private $sistemadeinformacion;
    
    /**
     * @ORM\OneToMany(targetEntity="Pagina", mappedBy="descriptor")
     */
    private $paginas;

    /**
     * @ORM\OneToMany(targetEntity="Roldescriptor", mappedBy="descriptor")
     */
    private $roles;

    /**
     * Set idnummodelo
     *
     * @param string $idnummodelo
     *
     * @return Descriptor
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
     *
     * @return Descriptor
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
     * Set estado
     *
     * @param string $estado
     *
     * @return Descriptor
     */
    public function setEstado($estado) {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado() {
        return $this->estado;
    }

    /**
     * Set tipodemodelo
     *
     * @param string $tipodemodelo
     *
     * @return Descriptor
     */
    public function setTipodemodelo($tipodemodelo) {
        $this->tipodemodelo = $tipodemodelo;

        return $this;
    }

    /**
     * Get tipodemodelo
     *
     * @return string
     */
    public function getTipodemodelo() {
        return $this->tipodemodelo;
    }

    /**
     * Set clasificaciondeseguridad
     *
     * @param string $clasificaciondeseguridad
     *
     * @return Descriptor
     */
    public function setClasificaciondeseguridad($clasificaciondeseguridad) {
        $this->clasificaciondeseguridad = $clasificaciondeseguridad;

        return $this;
    }

    /**
     * Get clasificaciondeseguridad
     *
     * @return string
     */
    public function getClasificaciondeseguridad() {
        return $this->clasificaciondeseguridad;
    }

    /**
     * Set piedefirma
     *
     * @param string $piedefirma
     *
     * @return Descriptor
     */
    public function setPiedefirma($piedefirma) {
        $this->piedefirma = $piedefirma;

        return $this;
    }

    /**
     * Get piedefirma
     *
     * @return string
     */
    public function getPiedefirma() {
        return $this->piedefirma;
    }

    /**
     * Set periodicidad
     *
     * @param string $periodicidad
     *
     * @return Descriptor
     */
    public function setPeriodicidad($periodicidad) {
        $this->periodicidad = $periodicidad;

        return $this;
    }

    /**
     * Get periodicidad
     *
     * @return string
     */
    public function getPeriodicidad() {
        return $this->periodicidad;
    }

    /**
     * Set aproximacion
     *
     * @param string $aproximacion
     *
     * @return Descriptor
     */
    public function setAproximacion($aproximacion) {
        $this->aproximacion = $aproximacion;

        return $this;
    }

    /**
     * Get aproximacion
     *
     * @return string
     */
    public function getAproximacion() {
        return $this->aproximacion;
    }

    /**
     * Set nombredescriptivo
     *
     * @param string $nombredescriptivo
     *
     * @return Descriptor
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
     * Set preguntaidentidad
     *
     * @param string $preguntaidentidad
     *
     * @return Descriptor
     */
    public function setPreguntaidentidad($preguntaidentidad) {
        $this->preguntaidentidad = $preguntaidentidad;

        return $this;
    }

    /**
     * Get preguntaidentidad
     *
     * @return string
     */
    public function getPreguntaidentidad() {
        return $this->preguntaidentidad;
    }

    /**
     * Set sistemadeinformacion
     *
     * @param string $sistemadeinformacion
     *
     * @return Descriptor
     */
    public function setSistemadeinformacion($sistemadeinformacion) {
        $this->sistemadeinformacion = $sistemadeinformacion;

        return $this;
    }

    /**
     * Get sistemadeinformacion
     *
     * @return string
     */
    public function getSistemadeinformacion() {
        return $this->sistemadeinformacion;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->paginas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add pagina
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Pagina $pagina
     *
     * @return Descriptor
     */
    public function addPagina(\SIGE\ModelGeneratorBundle\Entity\Pagina $pagina)
    {
        $this->paginas[] = $pagina;

        return $this;
    }

    /**
     * Remove pagina
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Pagina $pagina
     */
    public function removePagina(\SIGE\ModelGeneratorBundle\Entity\Pagina $pagina)
    {
        $this->paginas->removeElement($pagina);
    }

    /**
     * Get paginas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPaginas()
    {
        return $this->paginas;
    }

    /**
     * Set notametodologica
     *
     * @param string $notametodologica
     * @return Descriptor
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
     * Add roles
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Roldescriptor $roles
     * @return Descriptor
     */
    public function addRole(\SIGE\ModelGeneratorBundle\Entity\Roldescriptor $roles)
    {
        $this->roles[] = $roles;

        return $this;
    }

    /**
     * Remove roles
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Roldescriptor $roles
     */
    public function removeRole(\SIGE\ModelGeneratorBundle\Entity\Roldescriptor $roles)
    {
        $this->roles->removeElement($roles);
    }

    /**
     * Get roles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRoles()
    {
        return $this->roles;
    }
}
