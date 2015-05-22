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

class MateriaAdmin extends Admin
{
    protected $baseRouteName = 'sonata_admin_materia';
    protected $baseRoutePattern = 'materia';
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('codigo', 'text', array('label' => 'Código'))
            ->add('materia', 'text', array('label' => 'Materia'))
            ->add('curso', 'text', array('label' => 'Curso'))
            ->add('ensenanza', 'text', array('label' => 'Enseñanza'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('codigo')
            ->add('materia')
            ->add('curso')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('codigo')
            ->add('materia', 'text', array('label' => 'Materia'))
            ->add('curso', 'text', array('label' => 'Curso'))
            ->add('ensenanza', 'text', array('label' => 'Enseñanza'))
        ;
    }
}
