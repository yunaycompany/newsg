<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LogoutSuccessHandler
 *
 * @author yosbel
 */

namespace SIGE\SigeBundle\Handler;

use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;
use Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class LogoutSuccessHandler implements LogoutSuccessHandlerInterface {

    private $em;
    private $securityContext;

    public function __construct(TokenStorageInterface $securityContext, ObjectManager $om) {
        $this->om = $om;
        $this->securityContext = $securityContext;
    }

    public function onLogoutSuccess(Request $request) {       
        $response = new Response("{'success':". true."}", "200");
        return $response;
    }

}
