<?php

namespace SIGE\ModelGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RolModelo
 * 
 * @ORM\Table(name="mod_seguridad.tbrolmodelo")
 * @ORM\Entity(repositoryClass="SIGE\SecurityManagerBundle\Repository\RolModeloRepository")
 */
class RolModelo
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
     * @ORM\ManyToOne(targetEntity="SIGE\SecurityManagerBundle\Entity\Rol")
     * @ORM\JoinColumn(name="idrol", referencedColumnName="id")
     */
    private $rol;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\DataEntryBundle\Entity\Modelo")
     * @ORM\JoinColumns({
     *     @ORM\JoinColumn(name="idnummodelo", referencedColumnName="idnummodelo"),
     *     @ORM\JoinColumn(name="idsubnummodelo", referencedColumnName="idsubnummodelo"),
     *     @ORM\JoinColumn(name="idcodcentroinformante", referencedColumnName="codcentroinformante"),
     *     @ORM\JoinColumn(name="idcodvariante", referencedColumnName="idcodvariante"),
     *     @ORM\JoinColumn(name="idfechadelinformeacumulado", referencedColumnName="fechadelinformeacumulado")
     * })
     */
    private $modelo;

    /**
     * @var string
     */
    private $access;


    /**
     * Set rol
     *
     * @param integer $rol
     * @return RolModelo
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
     * Set idnummodelo
     *
     * @param string $idnummodelo
     * @return RolModelo
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
     * @return RolModelo
     */
    public function setIdsubnummodelo($idsubnummodelo)
    {
        $this->idsubnummodelo = $idsubnummodelo;

        return $this;
    }

    /**
     * Set fechadelinformeacumulado
     *
     * @param \DateTime $fechadelinformeacumulado
     * @return RolModelo
     */
    public function setFechadelinformeacumulado($fechadelinformeacumulado)
    {
        $this->fechadelinformeacumulado = $fechadelinformeacumulado;

        return $this;
    }

    /**
     * Set centroinformante
     *
     * @param string $centroinformante
     * @return RolModelo
     */
    public function setCentroinformante($centroinformante)
    {
        $this->centroinformante = $centroinformante;

        return $this;
    }

    /**
     * Set access
     *
     * @param string $access
     * @return RolModelo
     */
    public function setAccess($access)
    {
        $this->access = $access;

        return $this;
    }

    /**
     * Get access
     *
     * @return string 
     */
    public function getAccess()
    {
        return $this->access;
    }
    
    /**
     * Set id
     *
     * @param integer $id
     *
     * @return RolModelo
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
     * Set modelo
     *
     * @param \SIGE\DataEntryBundle\Entity\Modelo $modelo
     * @return RolModelo
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
