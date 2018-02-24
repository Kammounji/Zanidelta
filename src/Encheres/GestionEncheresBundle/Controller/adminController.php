<?php

namespace Encheres\GestionEncheresBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class adminController extends Controller
{
    public function  acceuilAction()
    {
        return $this->render('EncheresGestionEncheresBundle:admin:index.html.twig');
    }
    public function enchereAdminAction()
    {
        return $this->render('EncheresGestionEncheresBundle:admin:enchereAdmin.html.twig');
    }

}
