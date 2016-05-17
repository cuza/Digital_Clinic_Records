<?php
// src/AppBundle/Form/Type/GenderType.php
namespace AppBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
// ...
class GenderType extends AbstractType
{

    private $genderChoices;
    public function __construct(array $genderChoices)
    {
        $this->genderChoices = $genderChoices;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => $this->genderChoices,
        ));
    }
}