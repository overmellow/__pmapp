<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class LotteryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('LotteryNumber', TextType::class)
            ->add('Size', TextType::class)
            ->add('ticket_amount', TextType::class)
            ->add('jackpot', TextType::class)
            ->add('save', SubmitType::class)
        ;
    }
}
