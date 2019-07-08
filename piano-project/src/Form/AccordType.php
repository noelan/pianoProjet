<?php

namespace App\Form;

use App\Entity\Accord;
use App\Entity\Note;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class AccordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('mode', ChoiceType::class, [
                'choices' => [
                    'Majeur' => 'majeur',
                    'Mineur'    => 'mineur'
                ],
            ])
            ->add('notes', EntityType::class, [
                'class' => Note::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Accord::class,
        ]);
    }
}
