<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RepercucionType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => array(
                'Sin Incapacidad' => 'Sin Incapacidad',
                'Incapacidad temporal' => 'Incapacidad temporal',
                'Incapacidad Definitiva' => 'Incapacidad Definitiva',
            )
        ));

    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}