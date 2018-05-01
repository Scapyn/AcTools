<?php
namespace App\Form;

use App\Entity\ActUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class ActUserType extends AbstractType
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
        ->add('email', EmailType::class, array(
                'label' => 'Email',
                'attr' => array(
                    'placeholder' => 'Email'
        )))
        ->add('username', TextType::class, array (
                'label' => 'Nom utilisateur', 
                'attr' => array(
                    'placeholder' => 'Nom d utilisateur'
        )))
        ->add('password', RepeatedType::class, array(
            'type' => PasswordType::class,
            'first_options'  => array('label' => 'Mot de passe'),
            'second_options' => array('label' => 'Mot de passe - Confirmation'),
        ))
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => ActUser::class,
        ));
    }
}
