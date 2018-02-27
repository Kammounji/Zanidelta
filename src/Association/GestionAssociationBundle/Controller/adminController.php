<?php

namespace Association\GestionAssociationBundle\Controller;

use Association\GestionAssociationBundle\Entity\Categorie;
use Association\GestionAssociationBundle\Entity\Evenement;
use Association\GestionAssociationBundle\Form\RechercheForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class adminController extends Controller
{
    public function  acceuilAction()
    {
        return $this->render('AssociationGestionAssociationBundle:admin:index.html.twig');
    }
    public function  categorieAdminAction(Request $request)

    {
        $cat =new Categorie();
        $Form = $this->createForm(RechercheForm::class, $cat);
        $Form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($request->isXmlHttpRequest()) {   # isXmlHttpRequest pour l'ajax#

            $nom = $request->get('nom');

            $serializer = new Serializer(array(new ObjectNormalizer()));     # pour l'ajax#

            $cat= $em->getRepository("AssociationGestionAssociationBundle:Categorie")->findBy(array('nom' => $cat->getNom()));



            $c = $serializer->normalize($cat); # pour l'ajax#


            return new JsonResponse($c);    #  pour l'ajax#
        } else {


            $cat = $em->getRepository("AssociationGestionAssociationBundle:Categorie")->findAll();

        }


        return $this->render('AssociationGestionAssociationBundle:admin:categorieAdmin.html.twig',array(
            'cat'=>$cat,'form'=>$Form->createView()
        ));
    }

    public function ajoutCatAdminAction(Request $request)

    {
        $cat = new  Categorie();
        $form = $this->createForm('Association\GestionAssociationBundle\Form\CategorieType', $cat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($cat);
            $em->flush();

            //  return $this->redirectToRoute('AssociationGestionAssociationBundle:Default:layout.html.twig');
            return $this->redirectToRoute('evenementAdmin');

        }

        return $this->render('AssociationGestionAssociationBundle:admin:ajoutCategorie.html.twig', array(
            'cat' => $cat,
            'form' => $form->createView(),
        ));


    }

    function deleteAction($id){
        $em=$this->getDoctrine()->getManager();

        $cat=$em->getRepository("AssociationGestionAssociationBundle:Categorie")->find($id);
        $em->remove($cat);
        $em->flush();
        // return $this->redirectToRoute('liste');
        return $this->render('AssociationGestionAssociationBundle:admin:categorieAdmin.html.twig',array('cat'=>$cat));

    }


    function modifAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $cat=$em->getRepository("AssociationGestionAssociationBundle:Categorie")->find($id);
        $form = $this->createForm('Association\GestionAssociationBundle\Form\CategorieType', $cat);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();
            return $this->redirectToRoute('evenementAdmin',array('cat'=>$cat));
        }
        return $this->render('AssociationGestionAssociationBundle:admin:ajoutCategorie.html.twig',array('form'=>$form->createView(),'cat'=>$cat));

    }


    public function  evenementAdminAction(Request $request)

    {
        $em=$this->getDoctrine()->getManager();

        $event=new Evenement();
       // $form = $this->createForm('Association\GestionAssociationBundle\Form\RechercheForm', $event);
       // $form->handleRequest($request);
        //if ($form->isValid()) {
          //  $cat= $em->getRepository("AssociationGestionAssociationBundle:Categorie")->findBy(array('nom' => $cat->getNom()));


       // } else {

            $event = $em->getRepository("AssociationGestionAssociationBundle:Evenement")->findAll();
      //  }




        return $this->render('AssociationGestionAssociationBundle:admin:evenementAdmin.html.twig',array(
            'event'=>$event,
        ));
    }


   public function modifEtatAction($id){

        $em=$this->getDoctrine()->getManager();
        $event=$em->getRepository("AssociationGestionAssociationBundle:Evenement")->find($id);


           $event->setEtat(true);
            $em=$this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
            return $this->redirectToRoute('evenementAdmin',array('event'=>$event));


    }



}

