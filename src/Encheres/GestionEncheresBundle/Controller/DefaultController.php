<?php

namespace Encheres\GestionEncheresBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EncheresGestionEncheresBundle:Default:layout.html.twig');
    }
}
