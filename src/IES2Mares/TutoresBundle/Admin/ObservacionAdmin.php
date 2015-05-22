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

class ObservacionAdmin extends Admin
{
    protected $baseRouteName = 'sonata_admin_observacion';
    protected $baseRoutePattern = 'observacion';

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('edit');
    }


    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('cuestionario', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Cuestionario'))
//            ->add('profesor', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Profesor'))
            ->add('observacion', 'textarea')
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
            ->add('cuestionario', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Cuestionario'))
            ->add('profesor', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Profesor'))
        ;
    }

    public function getNewInstance()
    {
        $instance = parent::getNewInstance();
        $cuestionarioId = $this->getRequest()->getSession()->get('cuestionarioId');
        $profesor = $this->getConfigurationPool()->getContainer()->get('security.context')->getToken()
            ->getUser()->getProfesor();

        $entityManager = $this->getModelManager()->getEntityManager('IES2Mares\TutoresBundle\Entity\Cuestionario');

        $cuestionarioReference = $entityManager->getReference('IES2Mares\TutoresBundle\Entity\Cuestionario', $cuestionarioId);

        $instance->setProfesor($profesor);
        $instance->setCuestionario($cuestionarioReference);

        return $instance;
    }

}
