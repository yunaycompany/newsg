<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SecurityController
 *
 * @author yosbel
 */

namespace SIGE\SigeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializationContext;

class SecurityController extends Controller {

    /**
     *  @Route("/login", name="login")
     *  
     */
    public function loginAction() {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }
        $user = $this->getUser();
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            
        }

        $jsonData = $this->container->get('jms_serializer')->serialize($user, "json", SerializationContext::create()->setGroups(array('login')));
        $response = new Response("{'success': true, 'data':" . $jsonData . "}", "200");
        return $response;
    }
    
    /**
     *  @Route("/logout", name="logout")
     *  
     */
    public function logoutAction() {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $user->setOnline(0);
        $em->persist($user);
        $em->flush();
        $response = new Response("{'success':" . true . "}", "200");
        return $response;
    }

}
