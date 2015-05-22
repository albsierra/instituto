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

class CuestionarioasignadoController extends CRUDController{


    public function evaluarAction()
    {
        $idPendiente = $this->get('request')->get($this->admin->getIdParameter());
        $object = $this->admin->getObject($idPendiente);

        if (!$object) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id : %s', $idPendiente));
        }

        $id = $object->getCuestionario()->getId();
        return $this->redirectToRoute('sonata_admin_respuesta_crearRespuesta', array('id' => $id));
    }


}