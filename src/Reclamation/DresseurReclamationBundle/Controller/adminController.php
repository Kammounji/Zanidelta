<?php

namespace Reclamation\DresseurReclamationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class adminController extends Controller
{
    public function  acceuilAction()
    {
        return $this->render('ReclamationDresseurReclamationBundle:admin:index.html.twig');
    }
    public function  reclamationAdminAction()
    {
        return $this->render('ReclamationDresseurReclamationBundle:admin:reclamationAdmin.html.twig');
    }


}
