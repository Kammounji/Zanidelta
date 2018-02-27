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
        $em=$this->getDoctrine()->getManager();
        $am=$em->getRepository("TransactionsGestionCommandeBundle:Commande")->findAll();
        $user = $this->getUser();
        $uid=$user->getId();
        return $this->render('TransactionsGestionCommandeBundle:admin:commandeAdmin.html.twig',array('comm'=>$am,'uid'=>$uid));
    }


}
