<?php

namespace Store\GestionProduitsBundle\Controller;

use Store\GestionProduitsBundle\Entity\Favoris;
use Store\GestionProduitsBundle\Entity\Produit;
use Store\GestionProduitsBundle\Entity\Store;
use Store\GestionProduitsBundle\Form\CommentaireType;
use Store\GestionProduitsBundle\Form\FavorisType;
use Store\GestionProduitsBundle\Form\ProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Time;
use Veterinaire\GestionRDVBundle\Entity\Commentaire;

class DefaultController extends Controller
{

    public function slideproduitAction()
    {
        return $this->render('StoreGestionProduitsBundle:gestion_produit:produitSlideBar.html.twig');
    }

    public function produitdetaileAction(Request $request,$id)
    {
        $comm = new Commentaire();
        if($this->getUser() != null)
        {
            $user = $this->getUser();
            $uid=$user->getId();
            $s=$user->getNom();
        }
        else
        {$uid=null;
        $s=null;}
        $em=$this->getDoctrine()->getManager();
        $list=$em->getRepository("StoreGestionProduitsBundle:Favoris")->findAll();
        $liste=$em->getRepository("StoreGestionProduitsBundle:Produit")->findOneBy(['id'=>$id]);
        $am=$em->getRepository("VeterinaireGestionRDVBundle:Commentaire")->findAll();
        $form = $this->createForm(CommentaireType::class, $comm);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $user = $this->getUser();
            $uid=$user->getNom();
            $comm->setIdCible($id);
            $comm->setIdClient($uid);
            $comm->setDate(date_create());
            $pr = $this->getDoctrine()->getManager();
            $pr->persist($comm);
            $pr->flush();

            return $this->redirectToRoute("produit");

        }
        return $this->render('StoreGestionProduitsBundle:gestion_produit:produitdetail.html.twig',array(
            'form' => $form->createView(),
            'comm'=>$am,
            'l'=>$liste,
            'uid'=>$uid,
            'fav'=>$list,
            'u'=>$s
        ));

    }


    function deleteprodAction($id){
        $rr=$this->getDoctrine()->getManager();
        $liste=$rr->getRepository("StoreGestionProduitsBundle:Produit")->findAll();
        $modele=$rr->getRepository("VeterinaireGestionRDVBundle:Commentaire")->find($id);
        $rr->remove($modele);
        $rr->flush();

        return $this->redirectToRoute('produit');


    }
    function updateprodAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $modele=$em->getRepository("VeterinaireGestionRDVBundle:Commentaire")->find($id);
        $am=$em->getRepository("VeterinaireGestionRDVBundle:Commentaire")->findAll();
        $form=$this->createForm(CommentaireType::class,$modele);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush();
            return $this->redirectToRoute('produit');
        }

        return $this->render('StoreGestionProduitsBundle:gestion_produit:modifier.html.twig',array('m'=>$modele,'comm'=>$am,'form'=>$form->createView()));
    }


    public function ajoutmagAction(Request $request)
    {
        $produit = new Produit();

        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $user = $this->getUser();
            $uid=$user->getId();
            $idPropietaire=$produit->setIdPropietaire($uid);
            $pr = $this->getDoctrine()->getManager();
            $etat=$produit->setEtat("En attente");
            $prixAncien=$produit->setPrixAncien(0);
            $vote=$produit->setVote(0);
            $produit->upload();
            $pr->persist($produit);
            $pr->flush();
        return $this->redirectToRoute('affiche');

        }
        return $this->render('StoreGestionProduitsBundle:gestion_produit:ajout-store-magasin.html.twig',array(
            'form' => $form->createView()
        ));
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

    public function produitAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        if($this->getUser() != null)
        {
        $user = $this->getUser();
        $uid=$user->getId();

        }
        else
        {$uid=null;}
        $list=$em->getRepository("StoreGestionProduitsBundle:Favoris")->findAll();
        $liste=$em->getRepository("StoreGestionProduitsBundle:Produit")->findAll();
        $cat=$em->getRepository("AssociationGestionAssociationBundle:categorie")->findAll();
        $am  = $this->get('knp_paginator')->paginate(
            $liste,
            $request->query->get('page', 1)/*page number*/,
            4/*limit per page*/);
        return $this->render('StoreGestionProduitsBundle:gestion_produit:produit.html.twig',array('prod'=>$am,'m'=>$cat,'fav'=>$list,'uid'=>$uid));
    }

    public function afficheCatAction(Request $request ,$id)
    {
        $em=$this->getDoctrine()->getManager();
        if($this->getUser() != null)
        {
            $user = $this->getUser();
            $uid=$user->getId();
        }
        else
        {$uid=null;}
        $list=$em->getRepository("StoreGestionProduitsBundle:Favoris")->findAll();
        $liste=$em->getRepository("StoreGestionProduitsBundle:Produit")->filtreCat($id);
        $cat=$em->getRepository("AssociationGestionAssociationBundle:categorie")->findAll();
        $am  = $this->get('knp_paginator')->paginate(
            $liste,
            $request->query->get('page', 1)/*page number*/,
            4/*limit per page*/);
        return $this->render('StoreGestionProduitsBundle:gestion_produit:produit.html.twig',array('prod'=>$am,'m'=>$cat,'fav'=>$list,'uid'=>$uid));
    }
    public function ajoutfavAction($id)
    {
        $favoris = new Favoris();
        $em=$this->getDoctrine()->getManager();

            $user = $this->getUser();
            $uid=$user->getId();
            $favoris->setIdClient($uid);
            $favoris->setIdProduit($id);
            $em->persist($favoris);
            $em->flush();



        return $this->redirectToRoute('produit');
    }

    function deletefavAction($id){
        $rr=$this->getDoctrine()->getManager();
        $modele=$rr->getRepository("StoreGestionProduitsBundle:Favoris")->find($id);
        $rr->remove($modele);
        $rr->flush();



        return $this->redirectToRoute('produit');
    }

    public function afficherfavAction()
    {
        $em=$this->getDoctrine()->getManager();
        $list=$em->getRepository("StoreGestionProduitsBundle:Favoris")->findAll();
        $liste=$em->getRepository("StoreGestionProduitsBundle:Produit")->findAll();
        $user = $this->getUser();
        $uid=$user->getId();
        return $this->render('StoreGestionProduitsBundle:gestion_produit:favoris.html.twig',array('prod'=>$liste,'fav'=>$list,'uid'=>$uid));
    }


}

