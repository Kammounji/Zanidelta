<?php

namespace Veterinaire\GestionRDVBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class adminController extends Controller
{


    public function  acceuilAdminAction()
    {
        return $this->render('VeterinaireGestionRDVBundle:admin:index.html.twig');
    }
    public function  veterinaireAdminAction()
    {
        return $this->render('VeterinaireGestionRDVBundle:admin:veterinaireAdmin.html.twig');
    }

}
