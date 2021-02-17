<?php

namespace App\Form;

use App\Entity\Contest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ContestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('game_id',IntegerType::class,[
                'required' => true,
                'label'=> 'game_id'
            ])
            ->add('start_date',DateType::class,[
                'required' => true,
                'label'=> 'date de comencement '
            ])
            ->add('winner_id',IntegerType::class,[
                'required' => true,
                'label'=> 'le gagnant'
            ])
            ->add('valider',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contest::class,
        ]);
    }
}
