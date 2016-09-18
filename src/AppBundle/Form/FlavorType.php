<?php

namespace AppBundle\Form;

use Gelato\Production\Application\Service\Gelato\FlavorRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FlavorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('flavor', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => FlavorRequest::class,
                'empty_data' => function (FormInterface $form) {
                    return new FlavorRequest(
                        $form->get('flavor')->getData()
                    );
                }
            ]
        );
    }

    public function getName()
    {
        return 'Flavor';
    }
}
