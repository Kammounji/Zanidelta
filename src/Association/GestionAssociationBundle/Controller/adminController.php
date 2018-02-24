<?php

namespace Association\GestionAssociationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class adminController extends Controller
{
    public function  acceuilAction()
    {
        return $this->render('AssociationGestionAssociationBundle:admin:index.html.twig');
    }
    public function  associationAdminAction()
    {
        return $this->render('AssociationGestionAssociationBundle:admin:associationAdmin.html.twig');
    }


}

