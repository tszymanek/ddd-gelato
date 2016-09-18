<?php

namespace AppBundle\Form;

use Gelato\Sale\Application\Service\Freezer\CreateFreezerRequest;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FreezerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('capacity', NumberType::class, [
                'required' => false
            ])
            ->add('type', EntityType::class, [
                'class' => 'Gelato\Sale\Domain\Model\Freezer\FreezerType',
                'choices' => $options['types'],
            ])
            ->add('parlor')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired(['types']);
        $resolver->setDefaults(
            [
                'data_class' => CreateFreezerRequest::class,
                'empty_data' => function (FormInterface $form) {
                    return new CreateFreezerRequest(
                        $form->get('capacity')->getData(),
                        $form->get('type')->getData(),
                        $form->get('parlor')->getData()
                    );
                }
            ]
        );
    }

    public function getName()
    {
        return 'Freezer';
    }
}
