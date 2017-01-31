<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';
$loader->add("UCI\\Boson\\CacheBundle", __DIR__ . '/../vendor/boson/cache-bundle');
$loader->add("UCI\\Boson\\ExcepcionesBundle", __DIR__ . '/../vendor/boson/excepciones-bundle');

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
