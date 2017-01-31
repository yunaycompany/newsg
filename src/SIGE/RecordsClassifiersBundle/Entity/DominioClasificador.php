<?php

namespace SIGE\RecordsClassifiersBundle\Entity;

use SIGE\RecordsClassifiersBundle\Model\DominioClasificadorInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * DominioClasificador
 *
 * @ORM\Table(name="mod_sige.ndominioclasificador")
 * @ORM\Entity(repositoryClass="SIGE\RecordsClassifiersBundle\Repository\DominioClasificadorRepository")
 */
class DominioClasificador
implements DominioClasificadorInterface {
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombredescriptivo", type="string", length=255)
     */
    private $nombredescriptivo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=true)
     */
    private $descripcion;
    
    /**
     * Set id
     *
     * @param integer $id
     *
     * @return DominioClasificador
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
     * Set nombredescriptivo
     *
     * @param string $nombredescriptivo
     * @return DominioClasificador
     */
    public function setNombredescriptivo($nombredescriptivo)
    {
        $this->nombredescriptivo = $nombredescriptivo;

        return $this;
    }

    /**
     * Get nombredescriptivo
     *
     * @return string 
     */
    public function getNombredescriptivo()
    {
        return $this->nombredescriptivo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return DominioClasificador
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
}
