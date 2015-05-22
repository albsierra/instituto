<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 3/02/15
 * Time: 13:08
 */

namespace IES2Mares\TutoresBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Doctrine\ORM\Query\Lexer;

class TutoresAdmin extends AlumnoAdmin{
    protected $baseRouteName = 'sonata_admin_tutores';
    protected $baseRoutePattern = 'tutores';


    public function __construct($code, $class, $baseControllerName)
    {
        parent::__construct($code, $class, $baseControllerName);
        $this->setMaxPerPage(50);
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('evaluar', $this->getRouterIdParameter().'/evaluar');
        $collection->remove('edit');
        $collection->remove('create');
        $collection->remove('delete');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        parent::configureListFields($listMapper);
        $listMapper->add('_action', 'actions', array(
            'actions' => array(
                'Evaluar' => array(
                    'template' => 'TutoresBundle:Tutores:list__action_evaluar.html.twig',
                    'ask_confirmation'  => true
                )
            )
        ));

    }

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $query->join('TutoresBundle:Matricula', 'mat', 'WITH', 'mat.expediente = '.$query->getRootAlias().'.id');
        $query->andWhere(
            $query->expr()->eq('mat.grupo', ':grupo' )
        );
        $query->setParameter('grupo', $this->getConfigurationPool()->getContainer()->get('security.context')->getToken()
            ->getUser()->getProfesor()->getTutoria()->last()->getId());
        $query->addOrderBy($query->getRootAlias().'.apellido1');
        $query->addOrderBy($query->getRootAlias().'.apellido2');
        $query->addOrderBy($query->getRootAlias().'.nombre');

        return $query;
    }


    public function getBatchActions()
    {
        // retrieve the default (currently only the delete action) actions
        $actions = parent::getBatchActions();

            $actions['evaluar']=array(
                'label'            => $this->trans('action_evaluar', array(), 'SonataAdminBundle'),
                'ask_confirmation' => true // If true, a confirmation will be asked before performing the action
            );

        return $actions;
    }

}