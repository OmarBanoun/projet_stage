<?php

namespace App\Form;

use App\Entity\PsUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('role')
            ->add('name')
            ->add('firstname')
            ->add('login')
            ->add('password', PasswordType::class)
            ->add('number')
            ->add('numberComplement')
            ->add('street')
            ->add('city')
            ->add('country')
            ->add('postalCode')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PsUser::class,
        ]);
    }
}
