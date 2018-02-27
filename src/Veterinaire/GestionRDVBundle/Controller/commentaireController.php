<?php
/**
 * Created by PhpStorm.
 * User: Yessine
 * Date: 2/17/2018
 * Time: 5:08 PM
 */

namespace Veterinaire\GestionRDVBundle\Controller;

use Doctrine\DBAL\Types\DateType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;
use MyApp\UserBundle\Entity\User;
use Veterinaire\GestionRDVBundle\Entity\Commentaire;


class commentaireController extends Controller
{
    public function commentaddAction(Request $request)
    {
        if($request->get('texte')==NULL)
        {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface)
        {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $comment = new Commentaire();
        $em = $this->getDoctrine()->getManager();
        $veterinaire=$em->getRepository("MyAppUserBundle:User")->findOneById($request->get('cible'));
        $comment->setIdCible($veterinaire);
        $comment->setIdClient($user);
        $comment->setTexte($request->get('texte'));
      /* $literalTime    =   \DateTime::createFromFormat("d/m/Y H:i",date_default_timezone_get());

        */
        $today = new \DateTime('now');
        $today->format('Y-m-d H:i:s');
        $comment->setDate($today);
        $em->persist($comment);
        $em->flush();
        return new  Response("");
    }
    public function commentupdateAction(Request $request)
    {
        if($request->get('texte')==NULL)
        {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface)
        {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $em = $this->getDoctrine()->getManager();
        $comment=$em->getRepository("VeterinaireGestionRDVBundle:Commentaire")->findOneById($request->get('idcomment'));
        $comment->setTexte($request->get('texte'));
        $em->persist($comment);
        $em->flush();
        return new  Response("");
    }
    public function commentdeleteAction(Request $request)
    {
        if($request->get('idsupp')==NULL)
        {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface)
        {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $em = $this->getDoctrine()->getManager();
        $comment=$em->getRepository("VeterinaireGestionRDVBundle:Commentaire")->findOneById($request->get('idsupp'));
        $em->remove($comment);
        $em->flush();
        return new  Response("");
    }
}