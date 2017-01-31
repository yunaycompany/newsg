<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/05/16
 * Time: 14:12
 */

namespace SIGE\SigeBundle\Command;

use Sensio\Bundle\GeneratorBundle\Command\GenerateDoctrineCommand;
use Sensio\Bundle\GeneratorBundle\Command\Validators;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Sensio\Bundle\GeneratorBundle\Generator\DoctrineFormGenerator;

class SigeRestCommand extends GenerateDoctrineCommand {

    protected function configure() {
        $this
                ->setName('sige:generate:rest')
                ->setAliases(array('sige:generate:rest'))
                ->setDescription('Genera las clases y configuraciones básicas para utilizar servicios rest')
                ->setDefinition(array(
                    new InputArgument('entity', InputArgument::REQUIRED, 'Nombre del Bundle:Entidad '),
                ))
                ->setHelp(<<<EOT
The <info>%command.name%</info> cGenera las clases y configuraciones básicas para utilizar servicios rest:
Límite de generación de clases:
* Una Entidad:
  <info>php %command.full_name% MiAppBundle:Usuario</info> 
EOT
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output) {

        try {
            $entity = Validators::validateEntityName($input->getArgument('entity'));
            list($bundle, $entity) = $this->parseShortcutNotation($entity);

            $error = $this->crearController($entity, $bundle);
            if (!$error) {
                $output->writeln(sprintf(
                                'La clase %s.php se creó en %s.', $entity . "Controller", $bundle . DIRECTORY_SEPARATOR . $entity
                ));
            } else {
                $output->writeln(sprintf($error));
            }
            $error = $this->crearInterface($entity, $bundle);
            if (!$error) {
                $output->writeln(sprintf(
                                'La clase %s.php se creó en %s.', $entity . "Interface", $bundle . DIRECTORY_SEPARATOR."Model"
                ));
            } else {
                $output->writeln(sprintf($error));
            }
        } catch (\InvalidArgumentException $e) {
            $name = strtr($input->getArgument('name'), '/', '\\');
            $output->writeln(sprintf('Verifique el argumento "<info>%s</info>"', $name));
        }
    }

    protected function createGenerator() {
        return new DoctrineFormGenerator($this->getContainer()->get('filesystem'));
    }

    private function crearController($entidad, $nombreBundle) {
        $search = ["Entidad", "NombreBundle", "entidad"];
        $entidadMinuscula = strtolower($entidad);
        $replace = [$entidad, $nombreBundle, $entidadMinuscula];
        $pathBundle = __DIR__;
        $pathBundle = str_replace("SigeBundle".DIRECTORY_SEPARATOR."Command", "", $pathBundle);
        $filename = $pathBundle . "SigeBundle".DIRECTORY_SEPARATOR."Resources".DIRECTORY_SEPARATOR."SigeGenerateRest".DIRECTORY_SEPARATOR."EntidadController.txt";
        $entidadController = file_get_contents($filename);
        $entidadController = str_replace($search, $replace, $entidadController);
        $pathController = $pathBundle . $nombreBundle . DIRECTORY_SEPARATOR."Controller";
        $dir = dirname($pathController);
        $fileController = $pathController . DIRECTORY_SEPARATOR . $entidad . "Controller.php";
        if (!is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        if (!file_exists($fileController)) {
            file_put_contents($fileController, $entidadController);
            chmod($fileController, 0664);
        } else {
            return "Ya existe la clase " . $entidad . "Controller.php";
        }
    }

    private function crearInterface($entidad, $nombreBundle) {
        $pathBundle = __DIR__;
        $pathBundle = str_replace("SigeBundle".DIRECTORY_SEPARATOR."Command", "", $pathBundle);
        $filename = $pathBundle . "SigeBundle".DIRECTORY_SEPARATOR."Resources".DIRECTORY_SEPARATOR."SigeGenerateRest".DIRECTORY_SEPARATOR."EntidadInterface.txt";
        $entidadInterface = file_get_contents($filename);
        $entidadInterface = str_replace("NombreBundle", $nombreBundle, $entidadInterface);
        $entidadInterface = $entidadInterface . "\n" . 'Interface ' . $entidad . 'Interface extends ClassInterface {';

        //A partir de aqui se trabaja con la Entidad para crear la Interfaz
        $filename = $pathBundle . DIRECTORY_SEPARATOR . $nombreBundle . DIRECTORY_SEPARATOR.'Entity'.DIRECTORY_SEPARATOR . $entidad . '.php';
        $contenidoEntidad = file_get_contents($filename);
        $methods = strstr($contenidoEntidad, "public", false);
        $posMethodEnd = strpos($methods, ")");

        $metodoInterfaz = "";
        while ($posMethodEnd !== FALSE) {
            $posMethodEnd = $posMethodEnd + 1;
            $metodo = substr($methods, 0, $posMethodEnd);
            $methods = str_replace($metodo, "", $methods);
            if (FALSE === strpos($metodo, "__construct")) {
                $tempMetodoInterfaz = $metodo . ";";
                $metodoInterfaz = $metodoInterfaz . "\n" . $tempMetodoInterfaz;
            }
            $methods = strstr($methods, "public", false);
            $posMethodEnd = strpos($methods, ")");
        }

        $entidadInterface = $entidadInterface . "\n" . $metodoInterfaz . "\n" . "}";
        $pathInterface = $pathBundle . $nombreBundle . DIRECTORY_SEPARATOR."Model";
        $dir = dirname($pathInterface);
        $fileInterface = $pathInterface . DIRECTORY_SEPARATOR . $entidad . "Interface.php";

        if (!is_dir($dir)) {
            mkdir($dir, 0775, true);
        }
        if (!file_exists($fileInterface)) {
            file_put_contents($fileInterface, $entidadInterface);
            chmod($fileInterface, 0664);
        } else {
            unlink($fileInterface);
            file_put_contents($fileInterface, $entidadInterface);
            chmod($fileInterface, 0664);
//            return "Ya existe la clase " . $entidad . "Interface.php";
        }

        //A partir de aqui se pondra el implements la Interfaz Creada en la Entidad
        $posUse = strpos($contenidoEntidad, "use");
        $use = str_replace("-", "'\'", 'use SIGE-' . $nombreBundle . '-Model-' . $entidad . 'Interface;');
        $use = str_replace("'", "", $use);
        $exist = strpos($contenidoEntidad, $use);
        $use = $exist === FALSE ? $use : "";
        $contenidoEntidad1 = substr($contenidoEntidad, 0, $posUse) . $use . "\n";
        $contenidoEntidad2 = substr($contenidoEntidad, $posUse, strlen($contenidoEntidad));
        $posLlave = strpos($contenidoEntidad2, "{");
        $exist = strpos($contenidoEntidad, "implements");
        $implements = $exist === FALSE ? "implements " . $entidad . "Interface " : "";
        $contenidoEntidad21 = substr($contenidoEntidad2, 0, $posLlave);
        $contenidoEntidad22 = substr($contenidoEntidad2, $posLlave, strlen($contenidoEntidad2));
        $contenidoEntidad23 = $contenidoEntidad21 . $implements . $contenidoEntidad22;
        $contenidoEntidad3 = $contenidoEntidad1 . $contenidoEntidad23;

        $pathEntity = $pathBundle . $nombreBundle . DIRECTORY_SEPARATOR."Entity";
        $fileEntity = $pathEntity . DIRECTORY_SEPARATOR . $entidad . ".php";

        if (file_exists($fileEntity)) {
            file_put_contents($fileEntity, $contenidoEntidad3);
            chmod($fileEntity, 0664);
        }
    }

}
