<?php

namespace App\Form;

use App\Entity\Payment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class PaymentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('paymentMethod', ChoiceType::class, [
                'choices' => [
                    'ESP' => 'ESPECES',
                    'CB' => 'CARTE BLEU',
                    'TIC' => 'TICKET RESTAURANT',
                ]
            ])
            ->add('amount', MoneyType::class, [
                'divisor' => 100,
                //'data' => 'abcdef',
            ])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'REFUSED' => 'refused',
                    'ACCEPTED' => 'accepted',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Payment::class,
        ]);
    }
}
