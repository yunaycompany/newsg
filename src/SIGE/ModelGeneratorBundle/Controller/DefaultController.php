<?php

namespace SIGE\ModelGeneratorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ModelGeneratorBundle:Default:index.html.twig');
    }
}
