<?php

namespace App\Form;

use App\Entity\PsUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('role')
            ->add('name')
            ->add('firstname')
            ->add('login')
            ->remove('password')
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