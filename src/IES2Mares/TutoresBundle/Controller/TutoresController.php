<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 3/02/15
 * Time: 13:13
 */

namespace IES2Mares\TutoresBundle\Controller;

use IES2Mares\TutoresBundle\Entity\Cuestionario;
use IES2Mares\TutoresBundle\Entity\Cuestionarioasignado;
use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;

class TutoresController extends CRUDController{

    public function evaluarAction()
    {
        if ($this->admin->isGranted('EDIT') === false || $this->admin->isGranted('DELETE') === false)
        {
            throw new AccessDeniedException();
        }

        $id = $this->get('request')->get($this->admin->getIdParameter());

        $alumno = $this->admin->getObject($id);

        if (!$alumno) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id : %s', $id));
        }

        if(($cuestionario = $this->crearCuestionario($alumno)) && is_object($cuestionario->getAlumno())) {
            $profesores = $alumno->getProfesores();
            $profesores = $this->eliminarProfesoresDuplicados($profesores);
            $this->asignarCuestionarioProfesores($cuestionario, $profesores);
            $this->enviarCuestionarioProfesores(array($cuestionario), $profesores);
            return $this->redirectToRoute('sonata_admin_cuestionario_edit', array('id'=>$cuestionario->getId()));
        } else {
            return new RedirectResponse($this->admin->generateUrl('list', array('filter' => $this->admin->getFilterParameters())));
        }
    }

    public function batchActionEvaluar(ProxyQueryInterface $alumnosSeleccionadosQuery)
    {
        if ($this->admin->isGranted('EDIT') === false || $this->admin->isGranted('DELETE') === false)
        {
            throw new AccessDeniedException();
        }

        $modelManager = $this->admin->getModelManager();
        $alumnosSeleccionados = $alumnosSeleccionadosQuery->execute();
        $cuestionarios = array();
        $profesoresArray = array();

        foreach ($alumnosSeleccionados as $alumno) {

            if(($cuestionario = $this->crearCuestionario($alumno)) && is_object($cuestionario->getAlumno())) {
                $cuestionarios[] = $cuestionario;
                $profesores = $alumno->getProfesores();
                $profesoresArray = array_merge($profesoresArray, $profesores->toArray());
                $profesores = $this->eliminarProfesoresDuplicados($profesores);
                $this->asignarCuestionarioProfesores($cuestionario, $profesores);
            }
        }
        $profesoresArray = $this->eliminarProfesoresDuplicados($profesoresArray);
        $this->enviarCuestionarioProfesores($cuestionarios, $profesoresArray);

        return new RedirectResponse($this->admin->generateUrl('list', array('filter' => $this->admin->getFilterParameters())));
    }

    private function crearCuestionario($alumno){
        $cuestionario = new Cuestionario();
        if($alumno->getCuestionariosAbiertos()->count() == 0){
            $cuestionario->setAlumno($alumno);
            $cuestionario->setCreador($this->getUser()->getProfesor());
            $cuestionario->setCreatedat(new \DateTime());

            $em = $this->getDoctrine()->getManager();


            $repositorioPreguntas = $this->getDoctrine()->getRepository("TutoresBundle:Pregunta");
            $preguntas = $repositorioPreguntas->findBy(array('incluidapordefecto'=>1));

            foreach($preguntas as $pregunta) {
                $cuestionario->addPregunta($pregunta);
                $pregunta->addCuestionario($cuestionario);
                $em->persist($pregunta);
            }
            $em->persist($cuestionario);
            $em->flush();
        } else {
            $this->addFlash('sonata_flash_info', 'El alumno '.$alumno. ' ya tiene cuestionarios abiertos');
        }

        return $cuestionario;
    }

    private function enviarCuestionarioProfesores($cuestionarios, $profesores){
        $mailer = $this->get('mailer');
        $message = $mailer->createMessage()
            ->setSubject('Información alumn@')
            ->setFrom('informatica@iesdosmares.com')
            ->setBody(
                $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                    'TutoresBundle:Emails:enviarCuestionarioProfesores.html.twig',
                    array('cuestionarios' => $cuestionarios)
                ),
                'text/html'
            )
            /*
             * If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'Emails/registration.txt.twig',
                    array('name' => $name)
                ),
                'text/plain'
            )
            */
        ;
        foreach($profesores as $profesor){
            $emailsBcc[] = $profesor->getEmail();
            $this->addFlash('sonata_flash_success', 'Cuestionario enviado a '.$profesor);
        }
        $message->setBcc($emailsBcc);
        $mailer->send($message);
    }

    private function asignarCuestionarioProfesores($cuestionario, $profesores){
        $em = $this->getDoctrine()->getManager();

        foreach($profesores as $profesor){
            $cuestionarioasignado = new Cuestionarioasignado();
            $cuestionarioasignado->setCuestionario($cuestionario);
            $cuestionarioasignado->setProfesor($profesor);
            $em->persist($cuestionarioasignado);
        }
        $em->flush();
    }

    private function eliminarProfesoresDuplicados($profesoresArray){
        $claves = array();
        $profesores = array();
        foreach($profesoresArray as $profesor){
            if(!in_array($profesor->getId(), $claves)) {
                $claves[] = $profesor->getId();
                $profesores[] = $profesor;
            }
        }
        return $profesores;
    }

}