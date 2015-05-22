<?php

namespace IES2Mares\TutoresBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RespuestaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('apellidos')
            ->add('nombre')
            ->add('dni')
            ->add('movil')
            ->add('departamento')
            ->add('idusuario')
            ->add('cuestionario')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IES2Mares\TutoresBundle\Entity\Profesor'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ies2mares_bundle_profesor';
    }
}
