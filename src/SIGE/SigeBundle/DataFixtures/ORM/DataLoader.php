<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SIGE\SigeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Description of DataLoader
 *
 * @author rolando
 */
class DataLoader implements FixtureInterface {

    public function load(ObjectManager $manager) {
        $dir = __DIR__ . DIRECTORY_SEPARATOR . 'fixtures_base.sql';
//        $sql;
//
//        $directorio = opendir($dir); //ruta actual
//        while ($archivo = readdir($directorio)) { //obtenemos un archivo y luego otro sucesivamente
//            if (!is_dir($archivo)) {//verificamos si no es un directorio
                $sql = file_get_contents($dir);
                $manager->getConnection()->exec($sql);
                
                $manager->flush();
//            }
//        }
    }

}
