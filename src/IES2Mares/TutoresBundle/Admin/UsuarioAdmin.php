<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 2/02/15
 * Time: 20:40
 */

namespace IES2Mares\TutoresBundle\Admin;

use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use FOS\UserBundle\Model\UserManagerInterface;
use Sonata\AdminBundle\Route\RouteCollection;

use Sonata\UserBundle\Admin\Model\UserAdmin as BaseUserAdmin;


class UsuarioAdmin extends BaseUserAdmin
{
    protected $baseRouteName = 'sonata_admin_usuario';
    protected $baseRoutePattern = 'usuario';

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->with('General')
            ->add('username')
            ->add('email')
            ->end()
            ->add('apellidos', 'text', array('label' => 'Apellidos'))
            ->add('nombre', 'text', array('label' => 'Nombre'))
            ->add('profesor', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Profesor'))
        ;
    }

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
            ->add('username')
            ->add('email')
            ->add('plainPassword', 'text', array('required' => false))
            ->end()
            ->add('tipoUsuario', 'text', array('label' => 'Tipo'))
            ->add('apellidos', 'text', array('label' => 'Apellidos'))
            ->add('nombre', 'text', array('label' => 'Nombre'))
            ->add('roles', 'text', array('label' => 'Roles'))
            ->add('profesor', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Profesor'))
            ->end()
        ;

        if (!$this->getSubject()->hasRole('ROLE_SUPER_ADMIN')) {
            $formMapper
                ->with('Management')
                ->add('roles', 'sonata_security_roles', array(
                    'expanded' => true,
                    'multiple' => true,
                    'required' => false
                ))
                ->add('locked', null, array('required' => false))
                ->add('expired', null, array('required' => false))
                ->add('enabled', null, array('required' => false))
                ->add('credentialsExpired', null, array('required' => false))
                ->end()
            ;
        }

    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('apellidos')
            ->add('nombre')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('apellidos', 'text', array('label' => 'Apellidos'))
            ->add('nombre', 'text', array('label' => 'Nombre'))
            ->add('email', 'text', array('label' => 'email'))
//            ->add('roles', 'text', array('label' => 'Roles'))
            ->add('profesor', 'entity', array('class' => 'IES2Mares\TutoresBundle\Entity\Profesor'))
        ;
        if ($this->isGranted('ROLE_ALLOWED_TO_SWITCH')) {
            $listMapper
                ->add('impersonating', 'string', array('template' => 'SonataUserBundle:Admin:Field/impersonating.html.twig'))
            ;
        }
    }
}
