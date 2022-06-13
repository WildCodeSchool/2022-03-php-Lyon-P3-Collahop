<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EbookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, ['attr' => ['placeholder' => 'Prénom',
             'class' => 'row mx-0 my-3 my-md-2 ebook-input']])
            ->add('lastname', TextType::class, ['attr' => ['placeholder' => 'Nom',
             'class' => 'row mx-0 my-3 my-md-2 ebook-input']])
            ->add('company', TextType::class, ['attr' => ['placeholder' => 'Société',
             'class' => 'row mx-0 my-3 my-md-2 ebook-input']])
            ->add('email', EmailType::class, ['attr' => ['placeholder' => 'Email',
             'class' => 'row mx-0 my-3 my-md-2 ebook-input']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
