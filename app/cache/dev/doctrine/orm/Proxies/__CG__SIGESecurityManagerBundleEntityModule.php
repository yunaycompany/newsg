<?php

namespace Proxies\__CG__\SIGE\SecurityManagerBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Module extends \SIGE\SecurityManagerBundle\Entity\Module implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'SIGE\\SecurityManagerBundle\\Entity\\Module' . "\0" . 'id', '' . "\0" . 'SIGE\\SecurityManagerBundle\\Entity\\Module' . "\0" . 'nombredescriptivo', '' . "\0" . 'SIGE\\SecurityManagerBundle\\Entity\\Module' . "\0" . 'codename', '' . "\0" . 'SIGE\\SecurityManagerBundle\\Entity\\Module' . "\0" . 'app', '' . "\0" . 'SIGE\\SecurityManagerBundle\\Entity\\Module' . "\0" . 'rolModules', '' . "\0" . 'SIGE\\SecurityManagerBundle\\Entity\\Module' . "\0" . 'modulos', '' . "\0" . 'SIGE\\SecurityManagerBundle\\Entity\\Module' . "\0" . 'parent');
        }

        return array('__isInitialized__', '' . "\0" . 'SIGE\\SecurityManagerBundle\\Entity\\Module' . "\0" . 'id', '' . "\0" . 'SIGE\\SecurityManagerBundle\\Entity\\Module' . "\0" . 'nombredescriptivo', '' . "\0" . 'SIGE\\SecurityManagerBundle\\Entity\\Module' . "\0" . 'codename', '' . "\0" . 'SIGE\\SecurityManagerBundle\\Entity\\Module' . "\0" . 'app', '' . "\0" . 'SIGE\\SecurityManagerBundle\\Entity\\Module' . "\0" . 'rolModules', '' . "\0" . 'SIGE\\SecurityManagerBundle\\Entity\\Module' . "\0" . 'modulos', '' . "\0" . 'SIGE\\SecurityManagerBundle\\Entity\\Module' . "\0" . 'parent');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Module $proxy) {
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
            return (int)  parent::getId();
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
    public function setCodename($codename)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCodename', array($codename));

        return parent::setCodename($codename);
    }

    /**
     * {@inheritDoc}
     */
    public function getCodename()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodename', array());

        return parent::getCodename();
    }

    /**
     * {@inheritDoc}
     */
    public function setApp(\SIGE\SecurityManagerBundle\Entity\App $app = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setApp', array($app));

        return parent::setApp($app);
    }

    /**
     * {@inheritDoc}
     */
    public function getApp()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getApp', array());

        return parent::getApp();
    }

    /**
     * {@inheritDoc}
     */
    public function addRolModule(\SIGE\SecurityManagerBundle\Entity\RolModule $rolModules)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addRolModule', array($rolModules));

        return parent::addRolModule($rolModules);
    }

    /**
     * {@inheritDoc}
     */
    public function removeRolModule(\SIGE\SecurityManagerBundle\Entity\RolModule $rolModules)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeRolModule', array($rolModules));

        return parent::removeRolModule($rolModules);
    }

    /**
     * {@inheritDoc}
     */
    public function getRolModules()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRolModules', array());

        return parent::getRolModules();
    }

    /**
     * {@inheritDoc}
     */
    public function containsRol($rol, $name_rol = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'containsRol', array($rol, $name_rol));

        return parent::containsRol($rol, $name_rol);
    }

    /**
     * {@inheritDoc}
     */
    public function addModulo(\SIGE\SecurityManagerBundle\Entity\Module $modulos)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addModulo', array($modulos));

        return parent::addModulo($modulos);
    }

    /**
     * {@inheritDoc}
     */
    public function removeModulo(\SIGE\SecurityManagerBundle\Entity\Module $modulos)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeModulo', array($modulos));

        return parent::removeModulo($modulos);
    }

    /**
     * {@inheritDoc}
     */
    public function getModulos()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getModulos', array());

        return parent::getModulos();
    }

    /**
     * {@inheritDoc}
     */
    public function setParent(\SIGE\SecurityManagerBundle\Entity\Module $parent = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setParent', array($parent));

        return parent::setParent($parent);
    }

    /**
     * {@inheritDoc}
     */
    public function getParent()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getParent', array());

        return parent::getParent();
    }

}
