<?php

namespace Association\GestionAssociationBundle\Controller;

use Association\GestionAssociationBundle\Entity\Evenement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    public function espaceassociationAction()
    {
        return $this->render('AssociationGestionAssociationBundle:gestion_evenement:espace-association.html.twig');
    }


}
