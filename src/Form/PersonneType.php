<?php

namespace App\Form;

use App\Model\PersonneModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class,["label" => "Prénom de la personne", "attr" => ["placeholder" => "Max"]])
            ->add("nom", TextType::class,["label" => "Nom de la personne", "attr" => ["placeholder" => "Caufield"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            "data_class" => PersonneModel::class
        ]);
    }
}
