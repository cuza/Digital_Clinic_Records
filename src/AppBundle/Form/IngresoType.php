<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IngresoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaIngreso', 'datetime')
            ->add('fechaSalida', 'datetime')
            ->add('tipoIngreso')
            ->add('procedencia')
            ->add('estadoEgreso')
            ->add('necropsia')
            ->add('repercusionIncapacidadFisica')
            ->add('seguimiento')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Ingreso'
        ));
    }
}
