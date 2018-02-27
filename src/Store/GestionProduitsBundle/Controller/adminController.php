<?php

namespace Store\GestionProduitsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class adminController extends Controller
{
    public function  acceuilProduitAction()
    {
        return $this->render('StoreGestionProduitsBundle:admin:index.html.twig');
    }
    public function  produitAdminAction()
    {
        return $this->render('StoreGestionProduitsBundle:admin:produitAdmin.html.twig');
    }

}
