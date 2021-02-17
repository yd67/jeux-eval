<?php

namespace App\Form;

use App\Entity\Game;
use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class GameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',StringType::class,[
                'required' => true,
                'label'=> 'nom jeux'
            ])
            ->add('min_players',IntegerType::class,[
                'required' => true,
                'label' => 'nb min de joueurs'
            ])
            ->add('max_players',IntegerType::class,[
                'required' => true,
                'label'=> 'nb max de joueurs'
            ])
            ->add('valider',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Game::class,
        ]);
    }
}
