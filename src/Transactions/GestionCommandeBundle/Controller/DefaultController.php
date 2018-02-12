<?php

namespace Transactions\GestionCommandeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function cartAction()
    {
        return $this->render('TransactionsGestionCommandeBundle:gestion_commande:cart.html.twig');
    }

    public function checkoutAction()
    {
        return $this->render('TransactionsGestionCommandeBundle:gestion_commande:checkout.html.twig');
    }


}
