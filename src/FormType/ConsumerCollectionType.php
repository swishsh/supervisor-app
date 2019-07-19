<?php

namespace App\FormType;

use App\Dto\ConsumerCollection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsumerCollectionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'consumers', CollectionType::class, [
                'entry_type' => ConsumerType::class,
                'entry_options' => ['label' => false, 'attr' => ['class' => 'row']],
                ]
            )
            ->add('save', SubmitType::class, ['label' => 'Save supervisor config']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ConsumerCollection::class,
        ]);
    }
}
