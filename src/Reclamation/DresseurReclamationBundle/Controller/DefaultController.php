<?php

namespace Reclamation\DresseurReclamationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ReclamationDresseurReclamationBundle:Default:layout.html.twig');
    }


}
