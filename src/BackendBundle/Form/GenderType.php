<?php
namespace BackendBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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

    public function getParent(){
        return ChoiceType::class;
    }
}