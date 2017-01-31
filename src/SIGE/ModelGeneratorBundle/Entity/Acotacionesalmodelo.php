<?php

namespace SIGE\ModelGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acotacionesalmodelo
 *
 * @ORM\Table(name="mod_sige.tbacotacionesalmodelo")
 * @ORM\Entity(repositoryClass="SIGE\ModelGeneratorBundle\Repository\AcotacionesalmodeloRepository")
 */
class Acotacionesalmodelo
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     * @ORM\Id
     */
    private $fecha;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\DataEntryBundle\Entity\Modelo", inversedBy="acotaciones")
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
     * @ORM\ManyToOne(targetEntity="SIGE\SecurityManagerBundle\Entity\Rol", inversedBy="acotaciones")
     * @ORM\JoinColumn(name="idrol", referencedColumnName="id")
     * @ORM\Id
     */
    private $rol;

    /**
     * Set fechadelinformeacumulado
     *
     * @param \DateTime $fechadelinformeacumulado
     * @return Acotacionesalmodelo
     */
    public function setFechadelinformeacumulado($fechadelinformeacumulado)
    {
        $this->fechadelinformeacumulado = $fechadelinformeacumulado;

        return $this;
    }

    /**
     * Set idnummodelo
     *
     * @param string $idnummodelo
     * @return Acotacionesalmodelo
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
     * @return Acotacionesalmodelo
     */
    public function setIdsubnummodelo($idsubnummodelo)
    {
        $this->idsubnummodelo = $idsubnummodelo;

        return $this;
    }

    /**
     * Set rol
     *
     * @param integer $rol
     * @return Acotacionesalmodelo
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return integer 
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set modelos
     *
     * @param \SIGE\DataEntryBundle\Entity\Modelo $modelos
     * @return Acotacionesalmodelo
     */
    public function setModelos(\SIGE\DataEntryBundle\Entity\Modelo $modelos = null)
    {
        $this->modelos = $modelos;

        return $this;
    }

    /**
     * Get modelos
     *
     * @return \SIGE\DataEntryBundle\Entity\Modelo 
     */
    public function getModelos()
    {
        return $this->modelos;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Acotacionesalmodelo
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
        $this->modelos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add modelos
     *
     * @param \SIGE\DataEntryBundle\Entity\Modelo $modelos
     * @return Acotacionesalmodelo
     */
    public function addModelo(\SIGE\DataEntryBundle\Entity\Modelo $modelos)
    {
        $this->modelos[] = $modelos;

        return $this;
    }

    /**
     * Remove modelos
     *
     * @param \SIGE\DataEntryBundle\Entity\Modelo $modelos
     */
    public function removeModelo(\SIGE\DataEntryBundle\Entity\Modelo $modelos)
    {
        $this->modelos->removeElement($modelos);
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Acotacionesalmodelo
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set modelo
     *
     * @param \SIGE\DataEntryBundle\Entity\Modelo $modelo
     * @return Acotacionesalmodelo
     */
    public function setModelo(\SIGE\DataEntryBundle\Entity\Modelo $modelo = null)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return \SIGE\ModelGeneratorBundle\Entity\Modelo 
     */
    public function getModelo()
    {
        return $this->modelo;
    }
}
