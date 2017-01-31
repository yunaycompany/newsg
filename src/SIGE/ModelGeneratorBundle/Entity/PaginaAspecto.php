<?php

namespace SIGE\ModelGeneratorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaginaAspecto
 *
 * @ORM\Table(name="mod_sige.tbpagina_aspecto")
 * @ORM\Entity(repositoryClass="SIGE\ModelGeneratorBundle\Repository\PaginaAspectoRepository")
 */
class PaginaAspecto
{
    /**
     * @var int
     *
     * @ORM\Column(name="numcolumna", type="integer")
     */
    private $numcolumna;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\ModelGeneratorBundle\Entity\Pagina", inversedBy="paginaaspectos")
     * @ORM\JoinColumn(name="idnumpagina", referencedColumnName="id")
     * @ORM\Id
     */
    private $pagina;

    /**
     * @ORM\ManyToOne(targetEntity="SIGE\RecordsClassifiersBundle\Entity\Aspecto", inversedBy="paginaaspectos")
     * @ORM\JoinColumn(name="idalias", referencedColumnName="id")
     * @ORM\Id
     */
    private $alias;



    /**
     * Set numcolumna
     *
     * @param integer $numcolumna
     * @return PaginaAspecto
     */
    public function setNumcolumna($numcolumna)
    {
        $this->numcolumna = $numcolumna;

        return $this;
    }

    /**
     * Get numcolumna
     *
     * @return integer 
     */
    public function getNumcolumna()
    {
        return $this->numcolumna;
    }

    /**
     * Set pagina
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Pagina $pagina
     * @return PaginaAspecto
     */
    public function setPagina(\SIGE\ModelGeneratorBundle\Entity\Pagina $pagina)
    {
        $this->pagina = $pagina;

        return $this;
    }

    /**
     * Get pagina
     *
     * @return \SIGE\ModelGeneratorBundle\Entity\Pagina 
     */
    public function getPagina()
    {
        return $this->pagina;
    }

    /**
     * Set alias
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Aspecto $alias
     * @return PaginaAspecto
     */
    public function setAlias(\SIGE\RecordsClassifiersBundle\Entity\Aspecto $alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return \SIGE\RecordsClassifiersBundle\Entity\Aspecto 
     */
    public function getAlias()
    {
        return $this->alias;
    }
}
