<?php

namespace AppBundle\Form;

use Gelato\Production\Application\Service\Craftsman\CreateCraftsmanRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CraftsmanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
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
