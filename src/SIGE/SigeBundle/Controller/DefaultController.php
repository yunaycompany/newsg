<?php

namespace SIGE\SigeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('SigeBundle:Default:index.html.twig');
    }

}
