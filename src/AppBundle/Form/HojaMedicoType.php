<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HojaMedicoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('historiaEnfermedadActual')
            ->add('examenFisico')
            ->add('evolucionTratamiento')
            ->add('tratamientoAntibioticos')
            ->add('doctor')
            ->add('residente')
            ->add('ingreso')
            ->add('consulta')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\HojaMedico'
        ));
    }
}
