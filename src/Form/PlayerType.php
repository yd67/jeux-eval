<?php

namespace App\Form;

use App\Entity\Player;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email',EmailType::class,[
                'required' => true,
                'label'=> 'email'
            ])
            ->add('nickname',StringType::class,[
                'required' => true,
                'label'=> 'prenom'
            ])
            ->add('valider',SubmitType::class)
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Player::class,
        ]);
    }
}
