<?php


namespace AppBundle\Form\Type;
use AppBundle\Entity\Team;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class TeamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', ['attr' => ['class' => 'form-control']])
            ->add('logo', 'text', ['attr' => ['class' => 'form-control']])
            ->add('save', 'submit', ['attr' => ['class' => 'btn btn-primary']]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Team::class,
        ]);
    }

    public function getName()
    {
        return 'team';
    }
}
