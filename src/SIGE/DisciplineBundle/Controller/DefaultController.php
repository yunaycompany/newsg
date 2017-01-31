<?php

namespace SIGE\DisciplineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DisciplineBundle:Default:index.html.twig');
    }
}
