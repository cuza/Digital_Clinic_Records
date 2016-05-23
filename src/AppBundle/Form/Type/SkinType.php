<?php
namespace AppBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
// ...
class SkinType extends AbstractType
{

    private $skinChoices;
    public function __construct(array $skinChoices)
    {
        $this->skinChoices = $skinChoices;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => $this->skinChoices,
        ));
    }

    public function getParent(){
        return ChoiceType::class;
    }
}