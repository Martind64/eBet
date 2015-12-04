<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class AddFundsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('balance','number', [
                'attr' => ['class' => 'form-control'],
                'label' => 'Amount'

            ])
            ->add('Add Funds', 'submit', ['attr' => ['class' => 'btn btn-primary']]);
    }

    public function getName()
    {
        return 'funds';
    }
}