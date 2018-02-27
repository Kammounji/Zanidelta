<?php

namespace Store\GestionProduitsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function slideproduitAction()
    {
        return $this->render('StoreGestionProduitsBundle:gestion_produit:produitSlideBar.html.twig');
    }

    public function produitdetailAction()
    {
        return $this->render('StoreGestionProduitsBundle:gestion_produit:produitdetail.html.twig');
    }

    public function ajoutmagAction()
    {
        return $this->render('StoreGestionProduitsBundle:gestion_produit:ajout-store-magasin.html.twig');
    }

    public function espacemagAction()
    {
        return $this->render('StoreGestionProduitsBundle:gestion_produit:espace-magasin.html.twig');
    }

    public function modsuppstoreAction()
    {
        return $this->render('StoreGestionProduitsBundle:gestion_produit:mod-supp-store-magasin.html.twig');
    }

    public function modifdetailmagAction()
    {
        return $this->render('StoreGestionProduitsBundle:gestion_produit:modif-detail-store-magasin.html.twig');
    }

    public function produitAction()
    {
        return $this->render('StoreGestionProduitsBundle:gestion_produit:produit.html.twig');
    }

}

