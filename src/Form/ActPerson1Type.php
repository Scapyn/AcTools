<?php

namespace App\Form;

use App\Entity\ActPerson;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActPerson1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('isHuman')
            ->add('comment')
            ->add('job')
            ->add('firstname')
            ->add('lastname')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ActPerson::class,
        ]);
    }
}
