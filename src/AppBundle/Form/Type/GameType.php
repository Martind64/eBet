<?php
namespace AppBundle\Form\GameType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class GameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
            $builder
                ->add('name','text', ['attr' => ['class' => 'form-control']])
                ->add('logo','text', ['attr' => ['class' => 'form-control']])
                ->add('save', 'submit', ['attr' => ['class' => 'btn btn-primary']]);
    }

    public function getName()
    {
        return 'task';
    }
}