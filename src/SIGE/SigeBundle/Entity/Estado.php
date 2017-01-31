<?php

namespace SIGE\SigeBundle\Entity;

use SIGE\SigeBundle\Model\EstadoInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Estado
 *
 * @ORM\Table(name="mod_sige.nestado")
 * @ORM\Entity(repositoryClass="SIGE\SigeBundle\Repository\EstadoRepository")
 */
class Estado
implements EstadoInterface {
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
     * @ORM\OneToMany(targetEntity="SIGE\DataEntryBundle\Entity\Encuesta", mappedBy="estado")
     * @ORM\JoinColumn(name="idencuesta", referencedColumnName="id")
     */
    private $encuestas;
    
        /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombredescriptivo
     *
     * @param string $nombredescriptivo
     *
     * @return Estado
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
}
