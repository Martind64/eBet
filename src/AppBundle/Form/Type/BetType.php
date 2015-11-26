<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Bet;
use AppBundle\Entity\Game;
use AppBundle\Entity\Team;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotNull;

class BetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('homeOdds', 'text', [
                'attr' => ['placeholder' => ''],
                'constraints' => [
                    new NotNull(['message' => 'Please enter odds for home team'])
                ],
            ])
            ->add('awayOdds', 'text', [
                'attr' => ['placeholder' => ''],
                'constraints' => [
                    new NotNull(['message' => 'Please enter odds for away team'])
                ],
            ])
            ->add('homeTeam', 'entity', [
                'class' => Team::class,
                'choice_label' => 'name',
                'empty_value' => 'Select home team',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->orderBy('t.name', 'ASC');
                }
            ])
            ->add('awayTeam', 'entity', [
                'class' => Team::class,
                'choice_label' => 'name',
                'empty_value' => 'Select away team',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->orderBy('t.name', 'ASC');
                }
            ])
            ->add('game', 'entity', [
                'class' => Game::class,
                'choice_label' => 'name',
                'empty_value' => 'Select game',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('g')
                        ->orderBy('g.name', 'ASC');
                }
            ])
            ->add('save', 'submit', [
                'label' => 'Submit',
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Bet::class,
        ));
    }

    public function getName()
    {
        return 'bet';
    }
}
