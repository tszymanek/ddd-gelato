<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StoredGelatoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('meantFor', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => CreateCraftsmanRequest::class,
                'empty_data' => function (FormInterface $form) {
                    return new CreateCraftsmanRequest(
                        $form->get('firstName')->getData(),
                        $form->get('lastName')->getData()
                    );
                }
            ]
        );
    }

    public function getName()
    {
        return 'Craftsman';
    }
}