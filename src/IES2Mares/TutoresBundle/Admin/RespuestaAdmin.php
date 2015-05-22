<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 2/02/15
 * Time: 20:40
 */

namespace IES2Mares\TutoresBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class RespuestaAdmin extends Admin
{
    protected $baseRouteName = 'sonata_admin_respuesta';
    protected $baseRoutePattern = 'respuesta';

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('respuestasCuestionario', $this->getRouterIdParameter().'/respuestasCuestionario');
        $collection->add('crearRespuesta', $this->getRouterIdParameter().'/crearRespuesta');
        $collection->remove('edit');
        $collection->remove('list');
    }

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper
//            ->add('profesor', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Profesor', 'disabled' => true))
            ->add('preguntaincorporada', 'sonata_type_admin', array('btn_delete' => false, 'btn_add' => false , 'label' => 'Pregunta'))
//            ->add('preguntaincorporada', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Preguntaincorporada', 'disabled' => true))
            ->add('valor', 'choice',
                array('label' => 'Valor',
                    'choices' => array('Alto', 'Medio' , 'Bajo' ),
                    'expanded' => true
                ))
        ;


    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('profesor')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('preguntaincorporada', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Preguntaincorporada'))
            ->add('valor', 'text', array('label' => 'Valor'))
        ;
    }

    public function getNewInstance()
    {
        $instance = parent::getNewInstance();
        $cuestionarioId = $this->getRequest()->getSession()->get('cuestionarioId');
        $profesor = $this->getConfigurationPool()->getContainer()->get('security.context')->getToken()
            ->getUser()->getProfesor();

        $entityManager = $this->getModelManager()->getEntityManager('IES2Mares\TutoresBundle\Entity\Preguntaincorporada');
        $repository = $entityManager->getRepository('TutoresBundle:Preguntaincorporada');

//        $preguntaReference = $entityManager->getReference('IES2Mares\TutoresBundle\Entity\Preguntaincorporada', 5);
        $preguntaIncorporada = $repository->findPendientes($cuestionarioId, $profesor);
        if($preguntaIncorporada){
            $instance->setPreguntaincorporada($preguntaIncorporada);
        } else {
            $entityManager = $this->getModelManager()->getEntityManager('IES2Mares\TutoresBundle\Entity\Cuestionario');
            $cuestionario = $entityManager->getReference('IES2Mares\TutoresBundle\Entity\Cuestionario', $cuestionarioId);
            //marcamos el cuestionario como completado
            $entityManager = $this->getModelManager()->getEntityManager('IES2Mares\TutoresBundle\Entity\Cuestionarioasignado');
            $repository = $entityManager->getRepository('IES2Mares\TutoresBundle\Entity\Cuestionarioasignado');
            $cuestionarioDeProfesor = $repository->findOneBy(array('cuestionario' => $cuestionario, 'profesor' => $profesor));
            $cuestionarioDeProfesor->setCompletado(true);
            $entityManager->persist($cuestionarioDeProfesor);
            $entityManager->flush();

        }

        $instance->setProfesor($profesor);
        $instance->setValor(1); // Por defecto 'Medio'

        return $instance;
    }
}
