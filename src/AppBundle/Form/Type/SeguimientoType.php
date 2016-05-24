<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SeguimientoType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => array(
                'En consulta externa' => 'En Consulta externa',
                'Remision a otro hospital' => 'Remision a otro hospital',
                'Atención primaria' => 'Atencion primaria',
            )
        ));

    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}