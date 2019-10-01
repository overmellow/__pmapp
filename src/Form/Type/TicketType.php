<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('TicketNumber', TextType::class)
            ->add('BitcoinTransactionNumber', TextType::class)
            ->add('BitcoinTransactionDate', DateType::class, array(
                'required' => true,
                'widget' => 'single_text',
                'empty_data'  => '',
                ))
            ->add('save', SubmitType::class)
        ;
    }
}
