<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class ResultType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('result','choice', [
                'choices' => ['1' => '1', '2' => '2'],
                'multiple' => false,
                'expanded' => false,
                'label' => 'Winner',
            ]);
    }

    public function getName()
    {
        return 'result';
    }
}