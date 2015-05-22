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

class PreguntaincorporadaAdmin extends Admin
{
    protected $baseRouteName = 'sonata_admin_preguntaincorporada';
    protected $baseRoutePattern = 'preguntaincorporada';
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('cuestionario', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Cuestionario', 'disabled' => true))
            ->add('pregunta', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Pregunta', 'disabled' => true))
        ;
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
        $listMapper
            ->addIdentifier('id')
            ->add('cuestionario', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Cuestionario'))
            ->add('pregunta', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Pregunta'))
        ;
    }
}
