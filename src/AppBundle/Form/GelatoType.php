<?php

namespace AppBundle\Form;

use Doctrine\Common\Collections\ArrayCollection;
use Gelato\Production\Application\Service\Gelato\FlavorRequest;
use Gelato\Production\Application\Service\Gelato\ProduceGelatoRequest;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GelatoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('flavor', EntityType::class, [
                'class' => 'Gelato\Production\Domain\Model\Gelato\Flavor',
                'choices' => $options['flavors'],
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired(['flavors']);
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
        return 'Gelato';
    }
}
