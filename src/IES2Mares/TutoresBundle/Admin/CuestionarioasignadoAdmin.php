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

class CuestionarioasignadoAdmin extends Admin
{
    protected $baseRouteName = 'sonata_admin_cuestionarioasignado';
    protected $baseRoutePattern = 'cuestionarioasignado';

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('evaluar', $this->getRouterIdParameter().'/evaluar');
        $collection->remove('edit');
        $collection->remove('create');
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('cuestionario')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {

        parent::configureListFields($listMapper);
        $listMapper
            ->add('cuestionario', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Cuestionario'))
        ;
        $listMapper
            ->add('observaciones', 'text')
        ;
        $listMapper->add('_action', 'actions', array(
            'actions' => array(
                'Evaluar' => array(
                    'template' => 'TutoresBundle:Tutores:list__action_evaluar.html.twig'
                )
            )
        ));
    }

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $query->andWhere(
            $query->expr()->isNull('o.completado')
        );

        $query->andWhere(
            $query->expr()->eq('o.profesor', ':profesor' )
        );
        $query->setParameter('profesor', $this->getConfigurationPool()->getContainer()->get('security.context')->getToken()
            ->getUser()->getProfesor()->getId());

        return $query;
    }

}
