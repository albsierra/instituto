<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 2/02/15
 * Time: 20:40
 */

namespace IES2Mares\TutoresBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class CuestionarioAdmin extends Admin
{
    protected $baseRouteName = 'sonata_admin_cuestionario';
    protected $baseRoutePattern = 'cuestionario';

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('respondercuestionario', $this->getRouterIdParameter().'/respondercuestionario');
        $collection->add('showPreguntas', $this->getRouterIdParameter().'/showPreguntas');
        $collection->remove('create');
    }

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('alumno', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Alumno'), array(
                'admin_code' => 'sonata.admin.alumno'))
            ->add('creador', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Profesor'))
            ->add('fechaFin', 'date', array('label' => 'Fecha Límite'))
            ->add('observaciones', 'textarea', array('label' => 'Observaciones', 'required' => false))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('alumno')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('alumno', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Alumno', 'admin_code' => 'sonata.admin.alumno'))
            ->add('creador', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Profesor'))
            ->add('fechaFin', 'date', array('label' => 'Fecha Límite'))
            ->add('observaciones', 'text', array('label' => 'Observaciones'))
        ;
        $listMapper->add('_action', 'actions', array(
            'actions' => array(
                'show' => array()
            )
        ));
    }

    /**
     * {@inheritdoc}
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('alumno', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Alumno', 'admin_code' => 'sonata.admin.alumno'))
            ->add('creador', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Profesor', 'label' => 'Tutor'))
//            ->add('fechaFin', 'date', array('label' => 'Fecha Límite'))
//            ->add('observaciones', 'text', array('label' => 'Observaciones'))
            ->add('cuestionariosasignados', 'sonata_type_collection', array('associated_property' => 'getProfesor'))
        ;
    }

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $query->andWhere(
            $query->expr()->eq('o.creador', ':profesor' )
        );
        $query->setParameter('profesor', $this->getConfigurationPool()->getContainer()->get('security.context')->getToken()
            ->getUser()->getProfesor()->getId());
        $query->addOrderBy($query->getRootAlias().'.createdat','DESC');

        return $query;
    }


}
