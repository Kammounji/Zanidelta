<?php

namespace Transactions\GestionCommandeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class adminController extends Controller
{

    public function  acceuilCommandeAction()
    {
        return $this->render('TransactionsGestionCommandeBundle:admin:index.html.twig');
    }
    public function  commandeAdminAction()
    {
        return $this->render('TransactionsGestionCommandeBundle:admin:commandeAdmin.html.twig');
    }

}
