<?php

namespace App\Form;

use App\Entity\ActContact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use App\Entity\ActUser;
use App\Entity\ActPerson;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ActContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contact')
            ->add('type')
            /*->add('persons', EntityType::class, array(
                'class'        => 'ActPersonType',
                'choice_label' => 'name',
                'multiple'     => true,
            ))*/
            ->add('person', EntityType::class, array(
            // looks for choices from this entity
            'class' => ActPerson::class,
            
            // uses the User.username property as the visible option string
            'choice_label' => 'name',
            
            // used to render a select box, check boxes or radios
            // 'multiple' => true,
            // 'expanded' => true,
        ))
        ->add('user', EntityType::class, array(
            // looks for choices from this entity
            'class' => ActUser::class,
            
            // uses the User.username property as the visible option string
            'choice_label' => 'username',
            
            // used to render a select box, check boxes or radios
            // 'multiple' => true,
            // 'expanded' => true,
        ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ActContact::class,
        ]);
    }
}
