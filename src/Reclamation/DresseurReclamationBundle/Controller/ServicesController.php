<?php

namespace Reclamation\DresseurReclamationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ServicesController extends Controller
{
    public function serviceAction()
    {
        return $this->render('ReclamationDresseurReclamationBundle:gestion_service:service.html.twig');
    }
}
