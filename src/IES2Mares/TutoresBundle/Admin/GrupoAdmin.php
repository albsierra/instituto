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

class GrupoAdmin extends Admin
{
    protected $baseRouteName = 'sonata_admin_grupo';
    protected $baseRoutePattern = 'grupo';
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('anyo', 'text', array('label' => 'Año'))
            ->add('curso', 'text', array('label' => 'Curso'))
            ->add('ensenanza', 'text', array('label' => 'Enseñanza'))
            ->add('grupo', 'text', array('label' => 'Grupo'))
            ->add('subgrupo', 'text', array('label' => 'Subgrupo'))
            ->add('tutor', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Profesor'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('anyo')
            ->add('grupo')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('anyo', 'text', array('label' => 'Año'))
            ->add('curso', 'text', array('label' => 'Curso'))
            ->add('ensenanza', 'text', array('label' => 'Enseñanza'))
            ->add('grupo', 'text', array('label' => 'Grupo'))
            ->add('subgrupo', 'text', array('label' => 'Subgrupo'))
            ->add('tutor', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Profesor'))
        ;
    }
}
