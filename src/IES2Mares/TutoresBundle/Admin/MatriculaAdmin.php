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

class MatriculaAdmin extends Admin
{
    protected $baseRouteName = 'sonata_admin_matricula';
    protected $baseRoutePattern = 'matricula';
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('expediente', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Alumno'), array(
                'admin_code' => 'sonata.admin.alumno'))
            ->add('grupo', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Grupo'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('expediente')
            ->add('grupo')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('expediente', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Alumno', 'admin_code' => 'sonata.admin.alumno'))
            ->add('grupo', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Grupo'))
        ;
    }
}
