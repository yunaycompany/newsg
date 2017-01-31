<?php

namespace SIGE\RecordsClassifiersBundle\Entity;


use SIGE\RecordsClassifiersBundle\Model\ClasificadorInterface;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

/**
 * Clasificador
 *
 * @ORM\Table(name="mod_sige.tbclasificador")
 * @ORM\Entity(repositoryClass="SIGE\RecordsClassifiersBundle\Repository\ClasificadorRepository")
 */
class Clasificador implements ClasificadorInterface {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", length=10)
     * @ORM\Id
     * @Groups({"list", "detail"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=25)
     * @Groups({"list", "detail"})
     */
    private $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="nombredescriptivo", type="string", length=25)
     * @Groups({"list", "detail"})
     */
    private $nombredescriptivo;

    /**
     * @ORM\ManyToOne(targetEntity="DominioClasificador")
     * @ORM\JoinColumn(name="iddominio", referencedColumnName="id")
     */
    private $dominio;

    /**
     * @ORM\OneToMany(targetEntity="SIGE\ModelGeneratorBundle\Entity\Pregunta", mappedBy="clasificador")
     */
    private $preguntas;

    /**
     * @ORM\OneToMany(targetEntity="Clasificacion", mappedBy="clasificador")
     */
    private $clasificaciones;

    /**
     * @ORM\ManyToMany(targetEntity="Registro", mappedBy="clasificadores")
     */
    private $registros;

    /**
     * @var string
     *
     * @ORM\Column(name="configuracion", type="string", length=5, nullable=true)
     */
    private $configuracion;

    /**
     * @ORM\OneToMany(targetEntity="Clasificador", mappedBy="codclasificadorsup")
     */
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="Clasificador", inversedBy="children")
     * @ORM\JoinColumn(name="codclasificadorsup", referencedColumnName="id")
     */
    private $codclasificadorsup;

    /**
     * Constructor
     */
    public function __construct() {
        $this->clasificaciones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->registros = new \Doctrine\Common\Collections\ArrayCollection();
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param string $id
     * @return Clasificador
     */
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return Clasificador
     */
    public function setAlias($alias) {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string 
     */
    public function getAlias() {
        return $this->alias;
    }

    /**
     * Set nombredescriptivo
     *
     * @param string $nombredescriptivo
     * @return Clasificador
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
     * Set configuracion
     *
     * @param string $configuracion
     * @return Clasificador
     */
    public function setConfiguracion($configuracion) {
        $this->configuracion = $configuracion;

        return $this;
    }

    /**
     * Get configuracion
     *
     * @return string 
     */
    public function getConfiguracion() {
        return $this->configuracion;
    }

    /**
     * Set dominio
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\DominioClasificador $dominio
     * @return Clasificador
     */
    public function setDominio(\SIGE\RecordsClassifiersBundle\Entity\DominioClasificador $dominio = null) {
        $this->dominio = $dominio;

        return $this;
    }

    /**
     * Get dominio
     *
     * @return \SIGE\RecordsClassifiersBundle\Entity\DominioClasificador 
     */
    public function getDominio() {
        return $this->dominio;
    }

    /**
     * Add clasificaciones
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Clasificacion $clasificaciones
     * @return Clasificador
     */
    public function addClasificacione(\SIGE\RecordsClassifiersBundle\Entity\Clasificacion $clasificaciones) {
        $this->clasificaciones[] = $clasificaciones;

        return $this;
    }

    /**
     * Remove clasificaciones
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Clasificacion $clasificaciones
     */
    public function removeClasificacione(\SIGE\RecordsClassifiersBundle\Entity\Clasificacion $clasificaciones) {
        $this->clasificaciones->removeElement($clasificaciones);
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
     * Add registros
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Registro $registros
     * @return Clasificador
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
     * Add children
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Clasificador $children
     * @return Clasificador
     */
    public function addChild(\SIGE\RecordsClassifiersBundle\Entity\Clasificador $children) {
        $this->children[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Clasificador $children
     */
    public function removeChild(\SIGE\RecordsClassifiersBundle\Entity\Clasificador $children) {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren() {
        return $this->children;
    }

    /**
     * Set codclasificadorsup
     *
     * @param \SIGE\RecordsClassifiersBundle\Entity\Clasificador $codclasificadorsup
     * @return Clasificador
     */
    public function setCodclasificadorsup(\SIGE\RecordsClassifiersBundle\Entity\Clasificador $codclasificadorsup = null) {
        $this->codclasificadorsup = $codclasificadorsup;

        return $this;
    }

    /**
     * Get codclasificadorsup
     *
     * @return \SIGE\RecordsClassifiersBundle\Entity\Clasificador 
     */
    public function getCodclasificadorsup() {
        return $this->codclasificadorsup;
    }

    /**
     * Add preguntas
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Pregunta $preguntas
     * @return Clasificador
     */
    public function addPregunta(\SIGE\ModelGeneratorBundle\Entity\Pregunta $preguntas)
    {
        $this->preguntas[] = $preguntas;

        return $this;
    }

    /**
     * Remove preguntas
     *
     * @param \SIGE\ModelGeneratorBundle\Entity\Pregunta $preguntas
     */
    public function removePregunta(\SIGE\ModelGeneratorBundle\Entity\Pregunta $preguntas)
    {
        $this->preguntas->removeElement($preguntas);
    }

    /**
     * Get preguntas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPreguntas()
    {
        return $this->preguntas;
    }
    
    public function __toString() {
        return $this->nombredescriptivo;
    }
}
