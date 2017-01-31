<?php

namespace Proxies\__CG__\SIGE\RecordsClassifiersBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Aspecto extends \SIGE\RecordsClassifiersBundle\Entity\Aspecto implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'SIGE\\RecordsClassifiersBundle\\Entity\\Aspecto' . "\0" . 'id', '' . "\0" . 'SIGE\\RecordsClassifiersBundle\\Entity\\Aspecto' . "\0" . 'children', '' . "\0" . 'SIGE\\RecordsClassifiersBundle\\Entity\\Aspecto' . "\0" . 'aliassuperior', '' . "\0" . 'SIGE\\RecordsClassifiersBundle\\Entity\\Aspecto' . "\0" . 'nombredescriptivo', '' . "\0" . 'SIGE\\RecordsClassifiersBundle\\Entity\\Aspecto' . "\0" . 'notametodologica', '' . "\0" . 'SIGE\\RecordsClassifiersBundle\\Entity\\Aspecto' . "\0" . 'tematica', '' . "\0" . 'SIGE\\RecordsClassifiersBundle\\Entity\\Aspecto' . "\0" . 'sistemasdeinformacion', '' . "\0" . 'SIGE\\RecordsClassifiersBundle\\Entity\\Aspecto' . "\0" . 'paginaaspectos');
        }

        return array('__isInitialized__', '' . "\0" . 'SIGE\\RecordsClassifiersBundle\\Entity\\Aspecto' . "\0" . 'id', '' . "\0" . 'SIGE\\RecordsClassifiersBundle\\Entity\\Aspecto' . "\0" . 'children', '' . "\0" . 'SIGE\\RecordsClassifiersBundle\\Entity\\Aspecto' . "\0" . 'aliassuperior', '' . "\0" . 'SIGE\\RecordsClassifiersBundle\\Entity\\Aspecto' . "\0" . 'nombredescriptivo', '' . "\0" . 'SIGE\\RecordsClassifiersBundle\\Entity\\Aspecto' . "\0" . 'notametodologica', '' . "\0" . 'SIGE\\RecordsClassifiersBundle\\Entity\\Aspecto' . "\0" . 'tematica', '' . "\0" . 'SIGE\\RecordsClassifiersBundle\\Entity\\Aspecto' . "\0" . 'sistemasdeinformacion', '' . "\0" . 'SIGE\\RecordsClassifiersBundle\\Entity\\Aspecto' . "\0" . 'paginaaspectos');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Aspecto $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function setId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', array($id));

        return parent::setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setNombredescriptivo($nombredescriptivo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNombredescriptivo', array($nombredescriptivo));

        return parent::setNombredescriptivo($nombredescriptivo);
    }

    /**
     * {@inheritDoc}
     */
    public function getNombredescriptivo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNombredescriptivo', array());

        return parent::getNombredescriptivo();
    }

    /**
     * {@inheritDoc}
     */
    public function setNotametodologica($notametodologica)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNotametodologica', array($notametodologica));

        return parent::setNotametodologica($notametodologica);
    }

    /**
     * {@inheritDoc}
     */
    public function getNotametodologica()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNotametodologica', array());

        return parent::getNotametodologica();
    }

    /**
     * {@inheritDoc}
     */
    public function setTematica($tematica)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTematica', array($tematica));

        return parent::setTematica($tematica);
    }

    /**
     * {@inheritDoc}
     */
    public function getTematica()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTematica', array());

        return parent::getTematica();
    }

    /**
     * {@inheritDoc}
     */
    public function addChild(\SIGE\RecordsClassifiersBundle\Entity\Aspecto $child)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addChild', array($child));

        return parent::addChild($child);
    }

    /**
     * {@inheritDoc}
     */
    public function removeChild(\SIGE\RecordsClassifiersBundle\Entity\Aspecto $child)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeChild', array($child));

        return parent::removeChild($child);
    }

    /**
     * {@inheritDoc}
     */
    public function getChildren()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getChildren', array());

        return parent::getChildren();
    }

    /**
     * {@inheritDoc}
     */
    public function setAliassuperior(\SIGE\RecordsClassifiersBundle\Entity\Aspecto $aliassuperior = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAliassuperior', array($aliassuperior));

        return parent::setAliassuperior($aliassuperior);
    }

    /**
     * {@inheritDoc}
     */
    public function getAliassuperior()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAliassuperior', array());

        return parent::getAliassuperior();
    }

    /**
     * {@inheritDoc}
     */
    public function setSistemadeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemadeinformacion = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSistemadeinformacion', array($sistemadeinformacion));

        return parent::setSistemadeinformacion($sistemadeinformacion);
    }

    /**
     * {@inheritDoc}
     */
    public function addSistemasdeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemasdeinformacion)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addSistemasdeinformacion', array($sistemasdeinformacion));

        return parent::addSistemasdeinformacion($sistemasdeinformacion);
    }

    /**
     * {@inheritDoc}
     */
    public function getSistemasdeinformacion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSistemasdeinformacion', array());

        return parent::getSistemasdeinformacion();
    }

    /**
     * {@inheritDoc}
     */
    public function removeSistemasdeinformacion(\SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion $sistemasdeinformacion)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeSistemasdeinformacion', array($sistemasdeinformacion));

        return parent::removeSistemasdeinformacion($sistemasdeinformacion);
    }

    /**
     * {@inheritDoc}
     */
    public function addPaginaaspecto(\SIGE\ModelGeneratorBundle\Entity\PaginaAspecto $paginaaspectos)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addPaginaaspecto', array($paginaaspectos));

        return parent::addPaginaaspecto($paginaaspectos);
    }

    /**
     * {@inheritDoc}
     */
    public function removePaginaaspecto(\SIGE\ModelGeneratorBundle\Entity\PaginaAspecto $paginaaspectos)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removePaginaaspecto', array($paginaaspectos));

        return parent::removePaginaaspecto($paginaaspectos);
    }

    /**
     * {@inheritDoc}
     */
    public function getPaginaaspectos()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPaginaaspectos', array());

        return parent::getPaginaaspectos();
    }

}
