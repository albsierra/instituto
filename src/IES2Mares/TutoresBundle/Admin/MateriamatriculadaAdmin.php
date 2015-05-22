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

class MateriamatriculadaAdmin extends Admin
{
    protected $baseRouteName = 'sonata_admin_materiamatriculada';
    protected $baseRoutePattern = 'materiamatriculada';
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('expediente', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Alumno'), array(
                'admin_code' => 'sonata.admin.alumno'))
            ->add('materia', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Materia'))
            ->add('profesor', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Profesor'))
            ->add('anyo', 'text', array('label' => 'Año'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('expediente')
            ->add('materia')
            ->add('anyo')
            ->add('profesor')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('expediente', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Alumno', 'admin_code' => 'sonata.admin.alumno'))
            ->add('materia', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Materia'))
            ->add('profesor', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Profesor'))
            ->add('anyo', 'text', array('label' => 'Año'))
        ;
    }
}
