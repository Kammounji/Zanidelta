<?php

namespace Veterinaire\GestionRDVBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function veterinaireAction()
    {
        return $this->render('VeterinaireGestionRDVBundle:gestion_veterinaire:veterinaire.html.twig');
    }
    public function veterinairedetailAction()
    {
        return $this->render('VeterinaireGestionRDVBundle:gestion_veterinaire:veterinairedetail.html.twig');
    }


    public function espaceveterinaireAction()
    {
        return $this->render('VeterinaireGestionRDVBundle:gestion_veterinaire:veterinaire.html.twig');
    }
    public function rendezvousAction()
    {
        return $this->render('VeterinaireGestionRDVBundle:gestion_veterinaire:veterinairedetail.html.twig');
    }
}
