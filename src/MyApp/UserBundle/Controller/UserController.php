<?php

namespace MyApp\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{

    public function afficheAction()
    {
        return $this->render('MyAppUserBundle:Default:layout.html.twig');
    }

    public function logandregAction()
    {
        return $this->render('MyAppUserBundle:login:log-reg.html.twig');
    }

}
