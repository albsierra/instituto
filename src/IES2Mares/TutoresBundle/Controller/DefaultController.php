<?php

namespace IES2Mares\TutoresBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $params = array(
            'mensaje' => 'Bienvenido al IES Dos Mares',
            'fecha' => date('d-m-yy'),
        );
        return $this->render('TutoresBundle:Default:index.html.twig', $params);
    }
}
