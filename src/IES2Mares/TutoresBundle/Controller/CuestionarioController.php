<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 3/02/15
 * Time: 13:13
 */

namespace IES2Mares\TutoresBundle\Controller;

use IES2Mares\TutoresBundle\Entity\Cuestionario;
use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

class CuestionarioController extends CRUDController{

    protected function configureListFields(ListMapper $listMapper)
    {
        parent::configureListFields($listMapper);
        $listMapper->add('_action', 'actions', array(
            'actions' => array(
                'Evaluar' => array(
                    'template' => 'TutoresBundle:Tutores:list__action_evaluar.html.twig'
                )
            )
        ));

    }

    public function respondercuestionarioAction()
    {
        $id = $this->get('request')->get($this->admin->getIdParameter());
        return $this->redirectToRoute('sonata_admin_respuesta_crearRespuesta', array('id' => $id));
    }

}