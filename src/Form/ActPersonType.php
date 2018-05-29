<?php
namespace App\Form;

use App\Entity\ActPerson;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class ActPersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('firstname', TextType::class, array (
            'label' => 'Prenom',
            'attr' => array(
                'placeholder' => 'Prenom'
            )))
            ->add('lastname', TextType::class, array (
                'label' => 'Nom',
                'attr' => array(
                    'placeholder' => 'Nom'
                )))
                ->add('name', TextType::class, array(
                    'label' => 'Nom complet',
                    'attr' => array(
                        'placeholder' => 'Nom complet'
                    )))
                    ->add('comment', TextType::class, array (
                        'label' => 'Commentaires',
                        'attr' => array(
                            'placeholder' => 'Commentaires'
                        )))
                        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => ActPerson::class,
        ));
    }
}
