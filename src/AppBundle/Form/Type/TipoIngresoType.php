<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TipoIngresoType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => array(
                'Efectivo' => 'Efectivo',
                'Urgencia' => 'Urgencia',
            )
        ));
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}