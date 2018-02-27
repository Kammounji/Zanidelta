<?php

namespace Reclamation\DresseurReclamationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ServicesController extends Controller
{
    public function serviceAction()
    {
        return $this->render('ReclamationDresseurReclamationBundle:gestion_service:service.html.twig');
    }
    public function animalpAction()
    {
        return $this->render('ReclamationDresseurReclamationBundle:gestion_service:animalp.html.twig');
    }
    public function animalsdfAction()
    {
        return $this->render('ReclamationDresseurReclamationBundle:gestion_service:animalsdf.html.twig');
    }
    public function rvdresseurAction()
    {
        return $this->render('ReclamationDresseurReclamationBundle:gestion_service:rvdresseur.html.twig');
    }
    public function dresseurdetailAction()
    {
        return $this->render('ReclamationDresseurReclamationBundle:gestion_service:dresseurdetail.html.twig');
    }
    public function grvdresseurAction()
    {
        return $this->render('ReclamationDresseurReclamationBundle:gestion_service:grvdresseur.html.twig');
    }
}
