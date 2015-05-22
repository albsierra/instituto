<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 3/02/15
 * Time: 13:13
 */

namespace IES2Mares\TutoresBundle\Controller;


use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RespuestaController extends CRUDController{


    /**
     * Create action
     *
     * @return Response
     *
     * @throws AccessDeniedException If access is not granted
     */
    public function crearRespuestaAction()
    {
        $session = $this->get('request')->getSession();
        if(!$session->isStarted())   $session->start();

        $id = $this->get('request')->get($this->admin->getIdParameter());
        $session->set('cuestionarioId', $id);

        return $this->redirectToRoute('sonata_admin_respuesta_create');
    }

    /**
     * Create action
     *
     * @return Response
     *
     * @throws AccessDeniedException If access is not granted
     */
    public function respuestasCuestionarioAction()
    {
        $cuestionarioId = $this->get('request')->get($this->admin->getIdParameter());

        $emCuestionario = $this->getDoctrine()->getRepository('TutoresBundle:Cuestionario');
        $emObservacion = $this->getDoctrine()->getRepository('TutoresBundle:Observacion');
        $cuestionario = $emCuestionario->find($cuestionarioId);
        $profesores = $cuestionario->getProfesores();
        $repositorioRespuesta = $this->getDoctrine()->getRepository('TutoresBundle:Respuesta');
        foreach($profesores as $profesor) {
            $respuestas[$profesor->getId()] = $repositorioRespuesta->findByCuestionarioIdProfesorId($cuestionarioId, $profesor->getId());
            $observacion[$profesor->getId()] = $emObservacion->findOneBy(array(
                'cuestionario'=>$cuestionario,
                'profesor' => $profesor
            ));
        }
        return $this->render("TutoresBundle:Respuesta:showRespuestas.html.twig",
            array (
                'respuestas' => $respuestas,
                'profesores' => $profesores,
                'observacion' => $observacion
            )
        );
    }

    /**
     * Create action
     *
     * @return Response
     *
     * @throws AccessDeniedException If access is not granted
     */
    public function createAction()
    {
        // the key used to lookup the template
        $templateKey = 'edit';

        if (false === $this->admin->isGranted('CREATE')) {
            throw new AccessDeniedException();
        }

        $object = $this->admin->getNewInstance();
// Si no quedan preguntas por contestar, solicitamos alguna observación
        if(!$object->getPreguntaincorporada()){

            return $this->redirectToRoute('sonata_admin_observacion_create');
        }

        $this->admin->setSubject($object);

        /** @var $form \Symfony\Component\Form\Form */
        $form = $this->admin->getForm();
        $form->setData($object);

        if ($this->getRestMethod()== 'POST') {
            $form->submit($this->get('request'));

            $isFormValid = $form->isValid();

            // persist if the form was valid and if in preview mode the preview was approved
            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved())) {

                if (false === $this->admin->isGranted('CREATE', $object)) {
                    throw new AccessDeniedException();
                }

                try {
                    $object = $this->admin->create($object);

                    if ($this->isXmlHttpRequest()) {
                        return $this->renderJson(array(
                            'result' => 'ok',
                            'objectId' => $this->admin->getNormalizedIdentifier($object)
                        ));
                    }

                    $this->addFlash(
                        'sonata_flash_success',
                        $this->admin->trans(
                            'flash_create_success',
                            array('%name%' => $this->escapeHtml($this->admin->toString($object))),
                            'SonataAdminBundle'
                        )
                    );

                    // redirect to edit mode
                    return $this->redirectTo($object);

                } catch (ModelManagerException $e) {
                    $isFormValid = false;
                }
            }

            // show an error message if the form failed validation
            if (!$isFormValid) {
                if (!$this->isXmlHttpRequest()) {
                    $this->addFlash(
                        'sonata_flash_error',
                        $this->admin->trans(
                            'flash_create_error',
                            array('%name%' => $this->escapeHtml($this->admin->toString($object))),
                            'SonataAdminBundle'
                        )
                    );
                }
            } elseif ($this->isPreviewRequested()) {
                // pick the preview template if the form was valid and preview was requested
                $templateKey = 'preview';
                $this->admin->getShow();
            }
        }

        $view = $form->createView();

        // set the theme for the current Admin Form
        $this->get('twig')->getExtension('form')->renderer->setTheme($view, $this->admin->getFormTheme());

        return $this->render($this->admin->getTemplate($templateKey), array(
            'action' => 'create',
            'form'   => $view,
            'object' => $object,
        ));
    }


}