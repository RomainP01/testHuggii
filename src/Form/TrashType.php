<?php

namespace App\Form;

use App\Entity\Trash;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrashType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('Weight')
            ->add('TrashType',ChoiceType::class, [
                'choices' => $this->getChoices()
            ])
            ->add('CreationDate')
            ->add('PickupDate')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trash::class,
        ]);
    }
    private function getChoices(){
        $choices = Trash::TYPE;
        $output = [];
        foreach($choices as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }
}
