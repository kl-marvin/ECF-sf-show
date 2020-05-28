<?php

namespace App\Form;

use App\Entity\Artist;
use App\Entity\City;
use App\Entity\MusicalStyle;
use App\Entity\Show;
use App\Entity\Venu;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddShowType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                "label" => false,
                "required" => true,
                'attr' => array(
                    'placeholder' => 'Nom de l\'évenement',
                ),
            ])
            ->add('date', DateType::class, [
                "label" => "Date de l'évenement",
                "required" => true,
                'widget' => 'single_text',

            ])
            ->add('rate', ChoiceType::class, [
                'choices' => [
                    '★' => 1,
                    '★★' => 2,
                    '★★★' => 3,
                    '★★★★' => 4,
                    '★★★★★' => 5,
                ],
                "label" => 'Note de l\'évenement'
            ])
            ->add('comment', TextareaType::class, [
                "label" => false,
                "required" => true,
                'attr' => array(
                    'placeholder' => 'Détails sur l\'évenement',
                    'rows' => 7
                ),
            ])
            ->add('artist', EntityType::class, [
                "class" => Artist::class,
                "choice_label" => "name",
                "label" => "Artiste ou Groupe"
            ])
            ->add('style', EntityType::class, [
                "class" => MusicalStyle::class,
                "choice_label" => "name",
                "label" => "Style de Musique"
            ])
            ->add('city', EntityType::class, [
                "class" => City::class,
                "choice_label" => "name",
                "label" => "Ville"
            ])
            ->add('venu', EntityType::class, [
                "class" => Venu::class,
                "choice_label" => "name",
                "label" => "Lieu"
            ])
            ->add('submit', SubmitType::class, [
                "label" => "Ajouter",
                "attr" => array(
                    "class" => "btn-block btn btn-primary mt-4"
                )
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Show::class,
        ]);
    }
}
