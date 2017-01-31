<?php

namespace SIGE\ModelGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formadecaptacion
 *
 * @ORM\Table(name="mod_sige.nformadecaptacion")
 * @ORM\Entity(repositoryClass="SIGE\ModelGeneratorBundle\Repository\FormadecaptacionRepository")
 */
class Formadecaptacion
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
     * @var string
     *
     * @ORM\Column(name="nombredescriptivo", type="string", length=255)
     */
    private $nombredescriptivo;
    
    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Formadecaptacion
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
     * @return Formadecaptacion
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
