<?php
namespace AppBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
// ...
class CivilStateType extends AbstractType
{

    private $civilStateChoices;
    public function __construct(array $civilStateChoices)
    {
        $this->civilStateChoices = $civilStateChoices;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => $this->civilStateChoices,
        ));
    }

    public function getParent(){
        return ChoiceType::class;
    }
}