<?php
/**
 * Created by PhpStorm.
 * User: azizkastalli
 * Date: 26/02/2018
 * Time: 12:27
 */

namespace Encheres\GestionEncheresBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MyApp\UserBundle\Entity\User;
use belousovr\belousovChatBundle\Form\ChatType;

class SessionencheresController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository(User::class)->findAll();

        $actionUrl = $this->generateUrl(
            'belousov_chat_ajax_send_message'
        );

        $getMessageUrl = $this->generateUrl(
            'belousov_chat_ajax_get_message'
        );

        $chatForm = $this->createForm(ChatType::class, null, array('action' => $actionUrl));

        return $this->render('EncheresGestionEncheresBundle:gestion_encheres:testchat.html.twig', array('chatForm' => $chatForm->createView(), 'users' => $users, 'getMessageUrl' => $getMessageUrl, 'currentUser' => $this->getUser()));
    }
}