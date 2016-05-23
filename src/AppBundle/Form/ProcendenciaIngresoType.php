<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ProcendenciaIngresoType extends AbstractType
{
    private $procendenciaIngreso;
    public function __construct(array $procendenciaIngreso)
    {
        $this->$procendenciaIngreso = $procendenciaIngreso;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => array(
                'Consulta Externa' => 'Consulta Externa',
                'Cuerpo de Guardia' => 'Cuerpo de Guardia',
            )
        ));
    }
    public function getParent()
    {
        return ChoiceType::class;
    }
}