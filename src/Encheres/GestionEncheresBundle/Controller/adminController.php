<?php

namespace Encheres\GestionEncheresBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Encheres\GestionEncheresBundle\Entity\Session;

class adminController extends Controller
{
    public function  acceuilAction()
    {
        return $this->render('EncheresGestionEncheresBundle:admin:index.html.twig');
    }
    public function enchereAdminAction()
    {
        $sessions= new Session();
        $em=$this->getDoctrine()->getManager();
        $sessions=$em->getRepository('EncheresGestionEncheresBundle:Session')->findAll();
        return $this->render('EncheresGestionEncheresBundle:admin:enchereAdmin.html.twig',array('sessions'=>$sessions));
    }
    public function ma_sessionAction($id)
    {

        $em=$this->getDoctrine()->getManager();
        $journal=$em->getRepository("EncheresGestionEncheresBundle:Journal")->findArray($id);

        return $this->render('EncheresGestionEncheresBundle:admin:enchereAdmin2.html.twig',array('journals'=>$journal));
    }
    public function  sessionsupprimAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $journal=$em->getRepository("EncheresGestionEncheresBundle:Journal")->findArray($id);
        foreach ($journal as $jour)
        {
            $em->remove($jour);
            $em->flush();
        }
        $sess=new Session();
        $sess=$em->getRepository("EncheresGestionEncheresBundle:Session")->find($id);

        $em->remove($sess);
        $em->flush();

        return $this->redirectToRoute('enchereAdmin');
    }

}
