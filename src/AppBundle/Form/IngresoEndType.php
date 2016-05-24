<?php

namespace AppBundle\Form;

use AppBundle\Form\Type\EstadoEgresoType;
use AppBundle\Form\Type\RepercucionType;
use AppBundle\Form\Type\SeguimientoType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IngresoEndType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('fechaIngreso', 'datetime')
//            ->add('tipoIngreso')
//            ->add('procedencia')
//            ->add('fechaSalida', 'datetime')
            ->add('estadoEgreso',EstadoEgresoType::class)
            ->add('necropsia')
            ->add('repercusionIncapacidadFisica',RepercucionType::class)
            ->add('seguimiento',SeguimientoType::class)
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
