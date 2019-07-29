<?php

namespace App\FormType;

use App\Dto\Consumer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsumerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label' => false, 'disabled' => true])
            ->add('numprocs', IntegerType::class, ['label' => false, 'attr' => ['class' => 'number-class']])
            ->add('autostart', IntegerType::class, ['label' => 'AutoStart proc:', 'attr' => ['class' => 'number-class']])
            ->add('template', HiddenType::class)
            ->add('command', HiddenType::class)
            ->add('platform', HiddenType::class)
            ->add('startsecs', HiddenType::class)
            ->add('ignore', HiddenType::class)
            ->add('stopwaitsecs', HiddenType::class);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Consumer::class,
        ]);
    }
}
