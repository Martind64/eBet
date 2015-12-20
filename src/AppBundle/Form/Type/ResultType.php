<?php
namespace AppBundle\Form\Type;

use AppBundle\Entity\Bet;
use AppBundle\Entity\Team;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ResultType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('homeTeam', 'entity', [
                'attr' => ['class' => 'form-control'],
                'class' => Team::class,
                'choice_label' => 'name',
                'empty_value' => 'Select home team',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->orderBy('t.name', 'ASC');
                }
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