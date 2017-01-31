<?php

namespace SIGE\RecordsClassifiersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RecordsClassifiersBundle:Default:index.html.twig');
    }
}
