<?php

namespace Encheres\GestionEncheresBundle\Controller;
use Association\GestionAssociationBundle\Entity\Categorie;
use Doctrine\DBAL\Types\DateTimeType;
use Encheres\GestionEncheresBundle\EncheresGestionEncheresBundle;
use Encheres\GestionEncheresBundle\Form\EncheresType;
use Encheres\GestionEncheresBundle\Repository\EncheresRepository;
use Store\GestionProduitsBundle\Entity\Produit;
use Encheres\GestionEncheresBundle\Entity\Encheres;
use Encheres\GestionEncheresBundle\Entity\Session;
use Store\GestionProduitsBundle\Repository\animalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Encheres\GestionEncheresBundle\Entity\Journal;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Constraints\Time;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Enchere controller.
 *
 */
class EncheresController extends Controller
{
    /**
     * Lists all enchere entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $encheres = $em->getRepository('EncheresGestionEncheresBundle:Encheres')->findAll();
        return $this->render('EncheresGestionEncheresBundle:gestion_encheres:mod-supp-store-magasin.html.twig', array(
            'encheres' => $encheres,
        ));
    }


    public function ajoutAction(Request $request)
    {

        $produit = new Produit();
        $enchere = new Encheres();
        $session = new Session();
        $categorie = new Categorie();

        $form = $this->createForm(EncheresType::class);
        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $data = $form->getData();
            $poid = $data['poid'];
            $label= $data['label'];
            $img=$data['image'];
            $categorie=$em->getRepository('AssociationGestionAssociationBundle:Categorie')->findOneBy(['nom'=>$data['categorie']]);
            $description=$data['description'];
            $prix=null;
            $date=$data['dateDebut'];

            if(!($data['categorie']=='produit' || $data['categorie']=='accessoires'))
            {$sexe=$data['sexe'];
                $age=$data['age'];}
            else
            {$sexe='';
            $age='';}

            $seuilmise=$data['seuilMise'];
            $seuilparticipants=$data['seuilParticipants'];
            $caracteristiques=$data['caracteristiques'];
            $idProprietaire=$data['idProprietaire'];

            $produit->setAge($age);
            $produit->setCaracteristiques($caracteristiques);
            $produit->setDescription($description);
            $produit->setLabel($label);
            $produit->setPrixNouv(0);
            $produit->setIdCategorie($categorie->getId());
            $produit->setVote(0);
            $produit->setUrlImg($img);
            $produit->setSexe($sexe);
            $produit->setPoid($poid);
            $produit->setIdPropietaire($idProprietaire);
            $produit->setPrixAncien(0);

            $enchere->setIdProprietaire($idProprietaire);
            $enchere->setSeuilMise($seuilmise);
            $enchere->setDateDebut($date);
            $enchere->setSeuilParticipants($seuilparticipants);

            $file=$produit->getUrlImg();
            $fileName = md5($file->getClientOriginalName());
            $file->move($this->getParameter('produits'), $fileName);
            $produit->setUrlImg($fileName);

            $em->persist($produit);
            $em->flush();
            $id_prd=$em->getRepository('EncheresGestionEncheresBundle:Encheres')->get_produit_id($fileName);
            $enchere->setIdCible($id_prd['id']);
            $em->persist($enchere);
            $em->flush();

            $id_encheres=$em->getRepository('EncheresGestionEncheresBundle:Session')
                ->getEncheresId($id_prd['id'],$idProprietaire,$seuilmise,$seuilparticipants);

            $session->setDerniereMise(0);
            $session->setEtat("en attente");
            $session->setIdGagnant("");
            $session->setId( $id_encheres['id_encheres']);

            $em->persist($session);
            $em->flush();

            return $this->render('EncheresGestionEncheresBundle:gestion_encheres:ajout-encheres.html.twig', array(
                'form' => $form->createView(),
            ));
        }

        return $this->render('EncheresGestionEncheresBundle:gestion_encheres:ajout-encheres.html.twig', array(
            'form' => $form->createView(),
        ));
    }



    /**
     * Finds and displays a enchere entity.
     *
     */
    public function showAction(Encheres $enchere)
    {
        $deleteForm = $this->createDeleteForm($enchere);

        return $this->render('EncheresGestionEncheresBundle:gestion_encheres:ajout-encheres.html.twig', array(
            'enchere' => $enchere,
            'delete_form' => $deleteForm->createView(),
        ));
    }


    public function modifAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $enchere=$em->getRepository('EncheresGestionEncheresBundle:Encheres')->find($id);
        $id_produit=$enchere->getIdCible();
        $produit=$em->getRepository('StoreGestionProduitsBundle:Produit')->find($id_produit);


        $form= $this->creerformulaire();
        $form->handleRequest($request);

        if ($form->isValid())
        { $em = $this->getDoctrine()->getManager();
            $data = $form->getData();
            $poid = $data['poid'];
            $label= $data['label'];
            $categorie='';
            $description=$data['description'];
            $prix=null;
            $date=$data['dateDebut'];

            if(!($data['categorie']=='produit' || $data['categorie']=='accessoires'))
            {$sexe=$data['sexe'];
             $age=$data['age'];}
            else
            {$sexe='';
             $age='';}

            $seuilmise=$data['seuilMise'];
            $seuilparticipants=$data['seuilParticipants'];
            $caracteristiques=$data['caracteristiques'];
            $userid=$data['userid'];

            $produit->setAge($age);
            $produit->setCaracteristiques($caracteristiques);
            $produit->setDescription($description);
            $produit->setLabel($label);
            $produit->setPrixNouv($prix);
            $produit->setIdCategorie($categorie);
            $produit->setVote(0);
            $produit->setSexe($sexe);
            $produit->setPoid($poid);
            $produit->setIdPropietaire($userid);
            $produit->setPrixAncien(0);

            $enchere->setIdCible("5");
            $enchere->setIdProprietaire($userid);
            $enchere->setSeuilMise($seuilmise);
            $enchere->setDateDebut($date);
            $enchere->setSeuilParticipants($seuilparticipants);

            $em->persist($produit);
            $em->flush();

            $em->persist($enchere);
            $em->flush();

            return $this->indexAction();
        }

        return $this->render('EncheresGestionEncheresBundle:gestion_encheres:modif.html.twig', array(
        'enchere' => $enchere,
        'produit' => $produit,
        'form' => $form->createView()
    ));

    }

    /**
     * Deletes a enchere entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $encheres=$em->getRepository('EncheresGestionEncheresBundle:Encheres')->find($id);
        $id_produit=$encheres->getIdCible();
        $produit=$em->getRepository('StoreGestionProduitsBundle:Produit')->find($id_produit);

        $em->remove($produit);
        $em->remove($encheres);
            $em->flush();

        return $this->indexAction();
    }


    public function produitAction(Request $request,$id)
    {
        if($request->get('trier')!="")
        {
            $em=$this->getDoctrine()->getManager();
            $serializer= new Serializer(array(new ObjectNormalizer()));
            if($request->get('trier')=="participants")
            {
                $encheres=$em->getRepository('EncheresGestionEncheresBundle:Encheres')->EncheresByParticipants($id);
            }
            else if($request->get('trier')=="mise")
            {
                $encheres=$em->getRepository('EncheresGestionEncheresBundle:Encheres')->EncheresByMise($id);
            }
            else if ($request->get('trier')=="date")
            {
                $encheres=$em->getRepository('EncheresGestionEncheresBundle:Encheres')->EncheresByDate($id);
            }

            $data = $serializer->normalize($encheres);
            return new JsonResponse($data);
        }

        $em=$this->getDoctrine()->getManager();
        $prd=$em->getRepository('EncheresGestionEncheresBundle:Encheres')->EncheresByCategorie($id);
        return $this->render('EncheresGestionEncheresBundle:gestion_encheres:encheres.html.twig',array('prod'=>$prd,'categorie'=>$id));
    }

    public function categorieAction()
    {    $categorie= new Categorie();
         $em=$this->getDoctrine()->getManager();
         $categorie=$em->getRepository('AssociationGestionAssociationBundle:Categorie')->findBy(['type'=>'encheres']);
        return $this->render('EncheresGestionEncheresBundle:gestion_encheres:categorie_encheres.html.twig',array('categorie'=>$categorie));
    }

    public function detailAction($id,Request $request)
    {
        $journal=new Journal();
        $session = new Session();
        $em=$this->getDoctrine()->getManager();

        if($request->get('action')=="participer")
        {
            $time = new \DateTime();
            $time->format('H:i:s \O\n Y-m-d');
            $em=$this->getDoctrine()->getManager();
            $prd=$em->getRepository('EncheresGestionEncheresBundle:Encheres')->encheresById($id);
            $journal->setDateMise($time);
            $journal->setIdSession($prd['id_encheres']);
            $usr=$this->getUser();
            $journal->setIdClient($request->get('usr'));
            $journal->setMise(0);
            $em->persist($journal);
            $em->flush();
            return new Response("aa");
        }

        else if($request->get('action')=="mise")
        {    $time = new \DateTime();
            $time->format('H:i:s \O\n Y-m-d');
            $em=$this->getDoctrine()->getManager();
            $prd=$em->getRepository('EncheresGestionEncheresBundle:Encheres')->encheresById($id);
            $journal->setDateMise($time);
            $journal->setIdSession($prd['id_encheres']);
            $journal->setIdClient($request->get('usr'));

            if($request->get('somme')=='')
               {$session = $em->getRepository('EncheresGestionEncheresBundle:Session')->findOneBy(['id'=>$prd['id_encheres']]);
                $journal->setMise($session->getDerniereMise()+1);}
              else
                  $journal->setMise($request->get('somme'));

            $em->persist($journal);
            $em->flush();
            return new Response("aa");
        }

        else if($request->get('action')=="afficher")
        {
            $serializer= new Serializer(array(new ObjectNormalizer()));
            $em=$this->getDoctrine()->getManager();
            $prd=$em->getRepository('EncheresGestionEncheresBundle:Encheres')->encheresById($id);
            $mise=$em->getRepository('EncheresGestionEncheresBundle:Journal')->getMise($prd['id_encheres']);
            $data = $serializer->normalize($mise);
            return new JsonResponse($data);
        }

        $prd=$em->getRepository('EncheresGestionEncheresBundle:Encheres')->encheresById($id);
        return $this->render('EncheresGestionEncheresBundle:gestion_encheres:encheresdetail.html.twig',array('prod'=>$prd));
    }


}
