<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HojaEnfermeriaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('temperatura')
            ->add('pulso')
            ->add('respiracion')
            ->add('tensionArterialMax')
            ->add('tensionArterialMin')
//            ->add('datetime', 'datetime')
            ->add('enfermero')
            ->add('ingreso')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\HojaEnfermeria'
        ));
    }
}
