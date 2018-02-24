<?php

namespace Veterinaire\GestionRDVBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Veterinaire\GestionRDVBundle\Entity\Commentaire;
use Symfony\Component\DependencyInjection\ContainerBuilder;


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
