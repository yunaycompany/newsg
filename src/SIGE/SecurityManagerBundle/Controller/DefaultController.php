<?php

namespace SIGE\SecurityManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SecurityManagerBundle:Default:index.html.twig');
    }
}
