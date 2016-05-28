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
            ->add('historiaEnfermedadActual',null , array('label' => 'Historia de la enfermedad actual'))
            ->add('examenFisico',null , array('label' => 'Examen físico'))
            ->add('impresionDiagnostica',null , array('label' => 'Impresión diagnostica'))
            ->add('evolucionTratamiento',null , array('label' => 'Evolución y tratamiento'))
            ->add('tratamientoAntibioticos',null , array('label' => 'Tratado con  antibioticos'))
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
