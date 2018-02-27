<?php

namespace Veterinaire\GestionRDVBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Veterinaire\GestionRDVBundle\Entity\Rdv_veterinaire;

class DefaultController extends Controller
{

    public function veterinairedetailAction()
    {
        return $this->render('VeterinaireGestionRDVBundle:gestion_veterinaire:veterinairedetail.html.twig');
    }


    public function espaceveterinaireAction()
    {
        return $this->render('VeterinaireGestionRDVBundle:gestion_veterinaire:espace-veterinaire.html.twig');
    }
    public function rendezvousAction()
    {

        $em=$this->getDoctrine()->getManager();
        $veterinaire=$em->getRepository("VeterinaireGestionRDVBundle:Rdv_veterinaire")->findAll();
        return $this->render('VeterinaireGestionRDVBundle:gestion_veterinaire:gestion-rendez-vous.html.twig',array(
            'veterinaire'=>$veterinaire
        ));


    }

}
