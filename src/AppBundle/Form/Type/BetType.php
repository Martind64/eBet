<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Bet;
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
            ->add('result', 'text', [
                'attr' => ['placeholder' => ''],
                'constraints' => [
                    new NotNull(['message' => 'Please enter a campaign name'])
                ],
            ])
            ->add('country', 'entity', [
                'class' => Team::class,
                'property' => 'name',
                'empty_value' => 'Select home team',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->orderBy('t.name', 'ASC');
                }
            ])
            ->add('save', 'submit', [
                'label' => 'Next',
                'attr' => [
                    'class' => 'btn-success pull-right'
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
