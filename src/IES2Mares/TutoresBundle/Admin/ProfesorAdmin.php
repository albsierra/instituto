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

class ProfesorAdmin extends Admin
{
    protected $baseRouteName = 'sonata_admin_profesor';
    protected $baseRoutePattern = 'profesor';
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('id', 'text', array('label' => 'Identificador'))
            ->add('apellidos', 'text', array('label' => 'Apellidos'))
            ->add('nombre', 'text', array('label' => 'Nombre'))
            ->add('dni', 'text', array('label' => 'DNI'))
            ->add('departamento', 'text', array('label' => 'Departamento'))
            ->add('idUsuario', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Usuario'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('apellidos')
            ->add('nombre')
            ->add('departamento')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('apellidos')
            ->add('nombre')
            ->add('departamento')
        ;
    }
}
