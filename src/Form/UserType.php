<?php

namespace App\Form;

use App\Model\UserModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class,["label" => "Email", "attr" => ["placeholder" => "Miam@gmail.com"]])
            ->add("mdp", TextType::class,["label" => "Mot de passe", "attr" => ["placeholder" => "1234"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            "data_class" => UserModel::class
        ]);
    }
}
