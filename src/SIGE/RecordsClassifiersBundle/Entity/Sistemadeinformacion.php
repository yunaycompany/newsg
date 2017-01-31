<?php

/**
 * Created by PhpStorm.
 * User: Alex Brito de las Cuevas
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\RecordsClassifiersBundle\Entity;

use SIGE\RecordsClassifiersBundle\Model\SistemadeinformacionInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Sistemadeinformacion
 *
 * @ORM\Table(name="mod_sige.tbsistemadeinformacion")
 * @ORM\Entity(repositoryClass="SIGE\RecordsClassifiersBundle\Repository\SistemadeinformacionRepository")
 */
class Sistemadeinformacion implements SistemadeinformacionInterface {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=10)
     */
    
    private $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="imagenlogo", type="text", length=255)
     */
    private $imagenlogo;

    /**
     * @var string
     *
     * @ORM\Column(name="tipodearchivo", type="string", length=255)
     */
    private $tipodearchivo;
    
    /**
     * @var string
     *
     * @ORM\Column(name="denominacion", type="string", length=255)
     */
    private $denominacion;

    /**
     * @ORM\ManyToMany(targetEntity="Registro", inversedBy="sistemasdeinformacion")
     * @ORM\JoinTable(
     *      name="mod_sige.tbsistemadeinformacion_registro",
     *      joinColumns={@ORM\JoinColumn(onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(onDelete="CASCADE")}
     * )
     */
    private $registros;

    /**
     * @ORM\ManyToMany(targetEntity="Indicador", inversedBy="sistemasdeinformacion")
     * @ORM\JoinTable(
     *      name="mod_sige.tbindicador_sistemadeinformacion"
     * )
     * 
     */
    private $indicadores;

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Sistemadeinformacion
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
     * Set alias
     *
     * @param string $alias
     *
     * @return alias
     */
    public function setAlias($alias) {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getAlias() {
        return $this->alias;
    }

    /**
     * Set tipodearchivo
     *
     * @param string $tipodearchivo
     *
     * @return Sistemadeinformacion
     */
    public function setTipodearchivo($tipodearchivo) {
        $this->tipodearchivo = $tipodearchivo;

        return $this;
    }

    /**
     * Get tipodearchivo
     *
     * @return string
     */
    public function getTipodearchivo() {
        return $this->tipodearchivo;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->registros = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add registros
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Registro $registros
     * @return Sistemadeinformacion
     */
    public function addRegistro(\SIGE\RecordsClassifiersBundle\Entity\Registro $registros) {
        $this->registros[] = $registros;

        return $this;
    }

    /**
     * Remove registros
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Registro $registros
     */
    public function removeRegistro(\SIGE\RecordsClassifiersBundle\Entity\Registro $registros) {
        $this->registros->removeElement($registros);
    }

    /**
     * Get registros
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRegistros() {
        return $this->registros;
    }


    /**
     * Set denominacion
     *
     * @param string $denominacion
     * @return Sistemadeinformacion
     */
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;

        return $this;
    }

    /**
     * Get denominacion
     *
     * @return string 
     */
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    /**
     * Add indicadores
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Indicador $indicadores
     * @return Sistemadeinformacion
     */
    public function addIndicadore(\SIGE\RecordsClassifiersBundle\Entity\Indicador $indicadores)
    {
        $this->indicadores[] = $indicadores;

        return $this;
    }

    /**
     * Get indicadores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIndicadores()
    {
        return $this->indicadores;
    }

    /**
     * Remove indicadores
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Indicador $indicadores
     */
    public function removeIndicadore(\SIGE\RecordsClassifiersBundle\Entity\Indicador $indicadores)
    {
        $this->indicadores->removeElement($indicadores);
    }

    /**
     * Set imagenlogo
     *
     * @param string $imagenlogo
     * @return Sistemadeinformacion
     */
    public function setImagenlogo($imagenlogo)
    {
        $this->imagenlogo = $imagenlogo;

        return $this;
    }

    /**
     * Get imagenlogo
     *
     * @return string 
     */
    public function getImagenlogo()
    {
        return $this->imagenlogo;
    }
}
