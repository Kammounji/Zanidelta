<?php

namespace Store\GestionProduitsBundle\Controller;

use Store\GestionProduitsBundle\Entity\Produit;
use Store\GestionProduitsBundle\Form\Etat;
use Store\GestionProduitsBundle\Form\ProduitType;
use Store\GestionProduitsBundle\Form\Rechercheform;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class adminController extends Controller
{
    public function  acceuilProduitAction()
    {
        return $this->render('StoreGestionProduitsBundle:admin:index.html.twig');
    }


    function updateEtatAction(Request $request,$id){
        $user = $this->getUser();
        $uid=$user->getNom();
        $em=$this->getDoctrine()->getManager();
        $modele=$em->getRepository("StoreGestionProduitsBundle:Produit")->find($id);
        $form=$this->createForm(Etat::class,$modele);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush();
            return $this->redirectToRoute('produitAdmin');


        }
        return $this->render('StoreGestionProduitsBundle:admin:ModifierEtat.html.twig',array('prod'=>$modele,'uid'=>$uid,'form'=>$form->createView()));
    }

    function deleteprodAction($id,Request $request)
    {
        $rr=$this->getDoctrine()->getManager();

        $modele=$rr->getRepository("StoreGestionProduitsBundle:Produit")->find($id);
        $rr->remove($modele);
        $rr->flush();
        return $this->produitAdminAction($request);
    }

    function chatAction(){
        $user = $this->getUser();
        $uid=$user->getNom();
        return $this->render('StoreGestionProduitsBundle:admin:Chat.html.twig',array('uid'=>$uid));

    }

    public function  produitAdminAction(Request $request)
    {
        $user = $this->getUser();
        $uid=$user->getNom();
        $produit = new Produit();
        $em=$this->getDoctrine()->getManager();
        $form = $this->createForm(Rechercheform::class, $produit);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $produit = $em->getRepository("StoreGestionProduitsBundle:Produit")->findBy(array('etat' => $produit->getEtat()));


        }
        else {
        $produit=$em->getRepository("StoreGestionProduitsBundle:Produit")->findAll();
        }
        return $this->render('StoreGestionProduitsBundle:admin:produitAdmin.html.twig',array('form'=>$form->createView(),'prod'=>$produit,'uid'=>$uid));
    }

}
