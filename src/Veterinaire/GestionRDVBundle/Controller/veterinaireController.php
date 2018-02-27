<?php

namespace Veterinaire\GestionRDVBundle\Controller;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;
use MyApp\UserBundle\Entity\User;
use Veterinaire\GestionRDVBundle\Entity\Notification;
use Veterinaire\GestionRDVBundle\Entity\Rdv_veterinaire;
use Veterinaire\GestionRDVBundle\Form\Rdv_veterinaireType;


class veterinaireController extends Controller
{
    public function veterinaireAction()
    {


        $em = $this->getDoctrine()->getManager();
        $user=$em->getRepository("MyAppUserBundle:User")->findAll();
        $vet = array();

        foreach ($user as $u)
        {
           if($u->hasRole("ROLE_VETERINAIRE")&& !is_null( $u->getPrixUnitaire()))
           {
               array_push($vet,$u);
           }
        }
        return $this->render('VeterinaireGestionRDVBundle:gestion_veterinaire:nosveterinaire.html.twig',
            array("vet"=>$vet

            ));
    }
    public function veterinaireprofileAction($id)
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();

        $vet=$em->getRepository("MyAppUserBundle:User")->findOneById($id);
        $comments=$em->getRepository("VeterinaireGestionRDVBundle:Commentaire")->findByIdCible($id);
        return $this->render('VeterinaireGestionRDVBundle:gestion_veterinaire:veterinairedetail.html.twig',
            array("vet"=>$vet,"comments"=>$comments

            ));
    }
    public function addrdvAction(Request $request)
    {
        $user = $this->getUser();

        $rdv=new Rdv_veterinaire();
        $form = $this->createForm(rdv_veterinaireType::class,$rdv);
        $form->handleRequest($request);
        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $rdv->setIdClient($user);
            $veterinaire=$em->getRepository("MyAppUserBundle:User")->findOneById($request->get('id'));
            $rdv->setIdVet($veterinaire);

            $prixseance=$veterinaire->getPrixUnitaire()*$rdv->getDureeSeance();
            $rdv->setPrix($prixseance);
            $em->persist($rdv);
            $em->flush();
            $this->get('session')->getFlashBag()->set('error', 'rendez-vous ajouté avec succés');
            $this->sendMail($user,'rendez-vous ajouté avec succés');
            return $this->redirectToRoute('affiche');
        }
        return $this->render("VeterinaireGestionRDVBundle:gestion_veterinaire:gestion-rendez-vous.html.twig",
            array("Form"=>$form->createView()));


    }
       public function set_prixAction(Request $request)
       {
           if ($request->get('prix') == NULL) {
               return $this->render("VeterinaireGestionRDVBundle:gestion_veterinaire:setPrix.html.twig");

           }
           else
               {
                   $user = $this->getUser();
                   $em = $this->getDoctrine()->getManager();
                   $user->setPrixUnitaire($request->get('prix'));
                   $em->persist($user);
                   $em->flush();
                   return new Response("");

               }
       }
    public function voirMezRdvzAction(Request $request)
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $rdv=$em->getRepository("VeterinaireGestionRDVBundle:Rdv_veterinaire")->findByIdVet($user);
        return $this->render("VeterinaireGestionRDVBundle:gestion_veterinaire:mesrdvz.html.twig",array(
            "rdv"=>$rdv
        ));

    }
    public function approuverAction (Request $request)
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $rdv=$em->getRepository("VeterinaireGestionRDVBundle:Rdv_veterinaire")->findOneById($request->get('idrdv'));
   $rdv->setEtat(true);
    $em->merge($rdv);
    $em->flush();
    $notification = new Notification();
    $client=$em->getRepository("MyAppUserBundle:User")->findOneById($request->get('idclientnotification'));
    $notification->setIdClient($client);
    $notification->setIdRdv($rdv);
    $temp="votre rendez vous avec le veterinaire ".$user->getUsername()."à été approuvé!";

        $this->sendMail($client,$temp);

    $notification->setNotification($temp);
    $em->persist($notification);
    $em->flush();
    return new Response("");

    }
    public function deleterdvAction (Request $request)
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $idrdv=$request->get('idrdv');
        $rdv=$em->getRepository("VeterinaireGestionRDVBundle:Rdv_veterinaire")->findOneById($idrdv);
        $em->remove($rdv);
        $em->flush();
        $notification = new Notification();
        $client=$em->getRepository("MyAppUserBundle:User")->findOneById($request->get('idclientnotification'));
        $notification->setIdClient($client);
        $temp="votre rendez vous avec le veterinaire ".$user->getUsername()."à été décliné!";

        $this->sendMail($client,$temp);

        $notification->setNotification($temp);
        $em->persist($notification);
        $em->flush();
        return new Response("");

    }
    public function annulerrdvAction ($id,Request $request)
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $rdv=$em->getRepository("VeterinaireGestionRDVBundle:Rdv_veterinaire")->findOneBy(['id'=>$id,'idClient'=>$user->getId()]);
        $temp="votre rendez vous avec le client ".$user->getNom()." ".$user->getPrenom()."à été annulé";
        $this->sendMail($rdv->getIdVet(),$temp);
        if($rdv){
            $rdv->setEtat(false);
            $em->merge($rdv);
            $em->flush();
        }

        return $this->redirectToRoute('voir_notif');

    }
    public function voirnotifAction()
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        $notif=$em->getRepository("VeterinaireGestionRDVBundle:Notification")->findBy(['idClient'=>$user->getId()]);
        return $this->render('VeterinaireGestionRDVBundle:gestion_veterinaire:mesnotification.html.twig',
            array("notifs"=>$notif

            ));
    }

    private function sendMail($user,$msg){

        $mail=new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'yessine.rebhi@esprit.tn';                 // SMTP username
            $mail->Password = 'moi1!toi2!soi3!';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, ssl also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            //Recipients
            $mail->setFrom('Zanimaux@contact.com', 'No Reply');
            //Set who the message is to be sent to
            $mail->addAddress($user->getEmail(), $user->getNom()." ".$user->getPrenom());
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Notification';
            $html=$this->renderView(
                'emails/notif.html.twig',
                array('user' => $user,'msg'=>$msg)
            );

            $mail->Body    = $html;
            $mail->AltBody = $msg;

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}
