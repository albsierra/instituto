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

class AlumnoAdmin extends Admin
{
    protected $baseRouteName = 'sonata_admin_alumno';
    protected $baseRoutePattern = 'alumno';

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('id', 'text', array('label' => 'Identificador'))
            ->add('apellido1', 'text', array('label' => 'Apellido1'))
            ->add('apellido2', 'text', array('label' => 'Apellido2'))
            ->add('nombre', 'text', array('label' => 'Nombre'))
            ->add('dni', 'text', array('label' => 'DNI'))
            ->add('fechaNac', 'date', array('label' => 'F. Nac.'))
//            ->add('idUsuario', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Usuario'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('apellido1')
            ->add('apellido2')
            ->add('nombre')
            ->add('dni')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', 'text', array('label' => 'Expediente'))
            ->add('apellido1', 'text', array('label' => 'Apellido1'))
            ->add('apellido2', 'text', array('label' => 'Apellido2'))
            ->add('nombre', 'text', array('label' => 'Nombre'))
            ->add('dni', 'text', array('label' => 'DNI'))
            ->add('fechaNac', 'date', array('label' => 'F. Nac.'))
        ;
    }
}
