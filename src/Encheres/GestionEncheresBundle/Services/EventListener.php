<?php


/**
 * Created by PhpStorm.
 * User: azizkastalli
 * Date: 20/02/2018
 * Time: 10:30
 */

namespace Encheres\GestionEncheresBundle\Services;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Encheres\GestionEncheresBundle\Entity\Journal;
use Encheres\GestionEncheresBundle\Entity\Session;
use Symfony\Component\HttpFoundation\StreamedResponse;

class EventListener
{
    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (!$entity instanceof Journal) {
            return;
        }


        $em = $args->getEntityManager();
        if($entity->getMise()!=0) {
            $session = $em->getRepository('EncheresGestionEncheresBundle:Session')->find($entity->getIdSession());
            $session->setDerniereMise($entity->getMise());
           if($session->getEtat()=="en attente")
           { $session->setEtat("en cours"); }
             $session->setidGagnant($entity->getIdClient());
             $em->persist($session);
             $em->flush();
        }

        }

}