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

class PreguntaAdmin extends Admin
{
    protected $baseRouteName = 'sonata_admin_pregunta';
    protected $baseRoutePattern = 'pregunta';
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        //TODO elegir el profesor que la crea
        $formMapper
            ->add('creador', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Profesor'))
            ->add('tipo', 'choice', array('choices'   => array('niveles' => 'Niveles', 'valor' => 'Valor'),'label' => 'Tipo'))
            ->add('enunciado', 'textarea', array('label' => 'Enunciado'))
            ->add('obligatoria', 'checkbox', array('label' => 'Obligatoria'))
            ->add('incluidapordefecto', 'checkbox', array('label' => 'Incluir por defecto'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('creador')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('creador', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Profesor'))
            ->add('tipo', 'text', array('label' => 'Tipo'))
            ->add('enunciado', 'textarea', array('label' => 'Enunciado'))
            ->add('obligatoria', 'boolean', array('label' => 'Obligatoria'))
            ->add('incluidaPorDefecto', 'boolean', array('label' => 'Incluir por defecto'))
        ;
    }
}
