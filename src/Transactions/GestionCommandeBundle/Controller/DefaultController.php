<?php

namespace Transactions\GestionCommandeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Transactions\GestionCommandeBundle\Entity\Commande;
use Transactions\GestionCommandeBundle\Entity\Lignecommande;
use Transactions\GestionCommandeBundle\Entity\Livraison;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;

class DefaultController extends Controller
{
    public function cartAction()
    {
        $session= $this->get('session');
        if (!$session->has('panier')) $session->set('panier',array());
        $i=0;
        $em=$this->getDoctrine()->getManager();
        $produits=$em->getRepository("StoreGestionProduitsBundle:Produit")->findArray(array_keys($session->get('panier')));
        foreach ($produits as $p){
          $i=$i+1;
        }
        return $this->render('TransactionsGestionCommandeBundle:gestion_commande:cart.html.twig',array('i'=>$i,'produits'=>$produits,
                            'panier'=>$session->get('panier')));
    }
    public function ma_commandeAction($id)
    {

        $em=$this->getDoctrine()->getManager();
        $ligne=$em->getRepository("TransactionsGestionCommandeBundle:Lignecommande")->findArray($id);
        $produits=$em->getRepository("StoreGestionProduitsBundle:Produit")->findAll();

        return $this->render('TransactionsGestionCommandeBundle:gestion_commande:ma_commande.html.twig',array('ligne'=>$ligne,'produits'=>$produits));
    }
    public function  commandeafficheAction()
    {
        $em=$this->getDoctrine()->getManager();
        $am=$em->getRepository("TransactionsGestionCommandeBundle:Commande")->findAll();
        $user = $this->getUser();
        $uid=$user->getId();
        return $this->render('TransactionsGestionCommandeBundle:gestion_commande:checkout.html.twig',array('comm'=>$am,'uid'=>$uid));
    }
    public function  commandepaiementAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $comm=new Commande();
        $comm=$em->getRepository("TransactionsGestionCommandeBundle:Commande")->find($id);
        $comm->setEtat(1);
        $em->persist($comm);
        $em->flush();
        return $this->commandeafficheAction();
    }
    public function  commandeannulAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $comm=new Commande();
        $comm=$em->getRepository("TransactionsGestionCommandeBundle:Commande")->find($id);

        $em->remove($comm);
        $em->flush();
        return $this->commandeafficheAction();
    }
    public function  checkout2Action()
    {
        $em=$this->getDoctrine()->getManager();
        $am=$em->getRepository("TransactionsGestionCommandeBundle:Commande")->findAll();
        $am1=$em->getRepository("MyAppUserBundle:User")->findAll();
        $user = $this->getUser();
        $uid=$user->getId();
        return $this->render('TransactionsGestionCommandeBundle:gestion_commande:checkout2.html.twig',array('us'=>$am1,'comm'=>$am,'uid'=>$uid));
    }
    public function  checkout3Action()
    {
        $em=$this->getDoctrine()->getManager();
        $am=$em->getRepository("TransactionsGestionCommandeBundle:Livraison")->findAll();
        $am1=$em->getRepository("MyAppUserBundle:User")->findAll();
        $user = $this->getUser();
        $uid=$user->getId();
        return $this->render('TransactionsGestionCommandeBundle:gestion_commande:checkout3.html.twig',array('us'=>$am1,'liv'=>$am,'uid'=>$uid));
    }

    public function checkoutAction()
    {
        $i=0;
        $session= $this->get('session');
        $panier = $session->get('panier');
        if ($panier != NULL) {
        $em=$this->getDoctrine()->getManager();
        $comm = new  Commande();
        $user = $this->getUser();
        $uid=$user->getId();
        $idClient=$comm->setIdClient($uid);
        $etat=$comm->setEtat(0);


        $em=$this->getDoctrine()->getManager();
        $produits=$em->getRepository("StoreGestionProduitsBundle:Produit")->findArray(array_keys($session->get('panier')));
            foreach ($produits as $p) {
                $i=$i+($p->getPrixNouv()*$panier[$p->getId()]);
            }
            $prixtot=$comm->setPrixTot($i);
            $em->persist($comm);
            $em->flush();

        $comms=$em->getRepository("TransactionsGestionCommandeBundle:Commande")->findLast($uid);
            foreach ($produits as $p) {
        $lincomm = new  Lignecommande();
        $idClient=$lincomm->setIdClient($uid);
        $idProduits=$lincomm->setIdProduit($p->getId());
        $idCommande=$lincomm->setIdCommande($comms['id']);
        $qte=$lincomm->setQte($panier[$p->getId()]);
        $em->persist($lincomm);
        $em->flush();
        unset($panier[$p->getId()]);
        $session->set('panier',$panier);
            }
            $session->remove('panier');
        }



        return $this->commandeafficheAction();
    }
    public function deleteCartAction($id){
        $session= $this->get('session');
        $panier = $session->get('panier');
        unset($panier[$id]);
        $session->set('panier',$panier);

        return $this->cartAction();

    }

    public function ajoutCartAction($id)

    {  $session= $this->get('session');

        if (!$session->has('panier')) $session->set('panier',array());
        $panier=$session->get('panier');
        if(array_key_exists($id,$panier)){

                    $panier[$id]=$panier[$id]+1;
            }else $panier[$id]=1;

            $session->set('panier',$panier);

        $em=$this->getDoctrine()->getManager();
        $am=$em->getRepository("StoreGestionProduitsBundle:Produit")->findAll();
        if (!$session->has('panier')) $session->set('panier',array());

        return $this->render('StoreGestionProduitsBundle:gestion_produit:produit.html.twig',array('prod'=>$am));
    }
    public function LivrerAction($id)
    {


            $em=$this->getDoctrine()->getManager();
            $liv = new Livraison();
            $user = $this->getUser();
            $uid=$user->getId();
            $idlivreur=$liv->setIdLivreur($uid);
            $etat=$liv->setEtat(0);
            $idCommande=$liv->setIdCommande($id);
            $em=$this->getDoctrine()->getManager();
            $comm=$em->getRepository("TransactionsGestionCommandeBundle:Commande")->find($id);
            $idClient=$liv->setIdClient($comm->getIdClient());
            $comm->setEtat(2);

        $em->persist($liv);
        $em->flush();
        $em->persist($comm);
        $em->flush();



        return $this->checkout2Action();
    }
    public function  livrerterAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $comm=new Commande();
        $liv = new Livraison();
        $liv=$em->getRepository("TransactionsGestionCommandeBundle:Livraison")->find($id);
        $liv->setEtat(1);
        $em->persist($liv);
        $em->flush();
        $IdCommande=$liv->getIdCommande();
        $comm=$em->getRepository("TransactionsGestionCommandeBundle:Commande")->find($IdCommande);
        $comm->setEtat(3);
        $em->persist($comm);
        $em->flush();

        return $this->checkout3Action();
    }
    public function genpdfAction()
    {
        $em=$this->getDoctrine()->getManager();
        $am=$em->getRepository("TransactionsGestionCommandeBundle:Commande")->findAll();
        $am1=$em->getRepository("MyAppUserBundle:User")->findAll();
        $user = $this->getUser();
        $uid=$user->getId();
        $html = $this->renderView('TransactionsGestionCommandeBundle:gestion_commande:livr.html.twig',array('us'=>$am1,'comm'=>$am,'uid'=>$uid));

        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="file.pdf"'
            ));
    }



}
