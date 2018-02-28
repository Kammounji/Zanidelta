<?php

namespace Association\GestionAssociationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function evenementAction()
    {
        return $this->render('AssociationGestionAssociationBundle:gestion_evenement:evenement.html.twig');
    }

    public function evendetailAction()
    {
        return $this->render('AssociationGestionAssociationBundle:gestion_evenement:evendetail.html.twig');
    }

    public function evenmeduimAction()
    {
        return $this->render('AssociationGestionAssociationBundle:gestion_evenement:evenmeduim.html.twig');
    }

    public function modsuppevennAction()
    {
        return $this->render('AssociationGestionAssociationBundle:gestion_evenement:mod-supp-evennement.html.twig');
    }

    public function moddetailevenAction()
    {
        return $this->render('AssociationGestionAssociationBundle:gestion_evenement:modif-detail-evennement.html.twig');
    }

    public function ajoutevenAction()
    {
        return $this->render('AssociationGestionAssociationBundle:gestion_evenement:ajout-evennement.html.twig');
    }

    public function espaceassociationAction()
    {
        return $this->render('AssociationGestionAssociationBundle:gestion_evenement:espace-association.html.twig');
    }
}
