<?php

namespace SIGE\SigeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configuracion
 *
 * @ORM\Table(name="mod_sige.tbconfiguracion")
 * @ORM\Entity(repositoryClass="SIGE\SigeBundle\Repository\ConfiguracionRepository")
 */
class Configuracion {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\SecurityManagerBundle\Entity\Usuario")
     * @ORM\JoinColumn(name="idusuario", referencedColumnName="id")
     */
    private $usuario;

    /**
     * @ORM\OneToOne(targetEntity="SIGE\SigeBundle\Entity\Configuracion")
     * @ORM\JoinColumn(name="idsistemadeinformacion", referencedColumnName="id")
     */
    private $sistemadeinformacion;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\ModelGeneratorBundle\Entity\TipoDeConfiguracion")
     * @ORM\JoinColumn(name="idtipodeconfiguracion", referencedColumnName="id")
     */
    private $tipodeconfiguracion;

    /**
     * @var string
     *
     * @ORM\Column(name="access", type="string", length=255)
     */
    private $configuracion;
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }


    /**
     * Set atributo
     *
     * @param string $atributo
     *
     * @return Configuracion
     */
    public function setAtributo($atributo)
    {
        $this->atributo = $atributo;

        return $this;
    }

    /**
     * Set valor
     *
     * @param string $valor
     *
     * @return Configuracion
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Set usuario
     *
     * @param \SIGE\SecurityManagerBundle\Entity\Usuario $usuario
     * @return Configuracion
     */
    public function setUsuario(\SIGE\SecurityManagerBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \SIGE\SecurityManagerBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set sistemadeinformacion
     *
     * @param \SIGE\SigeBundle\Entity\Configuracion $sistemadeinformacion
     * @return Configuracion
     */
    public function setSistemadeinformacion(\SIGE\SigeBundle\Entity\Configuracion $sistemadeinformacion = null)
    {
        $this->sistemadeinformacion = $sistemadeinformacion;

        return $this;
    }

    /**
     * Get sistemadeinformacion
     *
     * @return \SIGE\SigeBundle\Entity\Configuracion 
     */
    public function getSistemadeinformacion()
    {
        return $this->sistemadeinformacion;
    }

    /**
     * Set tipodeconfiguracion
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\TipoDeConfiguracion $tipodeconfiguracion
     * @return Configuracion
     */
    public function setTipodeconfiguracion(\SIGE\ModelGeneratorBundle\Entity\TipoDeConfiguracion $tipodeconfiguracion = null)
    {
        $this->tipodeconfiguracion = $tipodeconfiguracion;

        return $this;
    }

    /**
     * Get tipodeconfiguracion
     *
     * @return \SIGE\ModelGeneratorBundle\Entity\TipoDeConfiguracion 
     */
    public function getTipodeconfiguracion()
    {
        return $this->tipodeconfiguracion;
    }

    /**
     * Set configuracion
     *
     * @param string $configuracion
     * @return Configuracion
     */
    public function setConfiguracion($configuracion)
    {
        $this->configuracion = $configuracion;

        return $this;
    }

    /**
     * Get configuracion
     *
     * @return string 
     */
    public function getConfiguracion()
    {
        return $this->configuracion;
    }
}
