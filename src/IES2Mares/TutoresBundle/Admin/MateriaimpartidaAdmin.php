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

class MateriaimpartidaAdmin extends Admin
{
    protected $baseRouteName = 'sonata_admin_materiaimpartida';
    protected $baseRoutePattern = 'materiaimpartida';
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('materia', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Materia'))
            ->add('profesor', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Profesor'))
            ->add('grupo', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Grupo'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('profesor')
            ->add('grupo')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('materia', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Materia'))
            ->add('profesor', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Profesor'))
            ->add('grupo', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Grupo'))
        ;
    }
}
