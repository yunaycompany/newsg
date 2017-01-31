<?php

namespace SIGE\DataEntryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DataEntryBundle:Default:index.html.twig');
    }
}
