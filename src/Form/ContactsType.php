<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, ['attr' => ['placeholder' => 'Prénom',
                'class' => 'contact_form_input']])
            ->add('lastname', TextType::class, ['attr' => ['placeholder' => 'Nom',
                'class' => 'contact_form_input']])
            ->add('email', EmailType::class, ['attr' => ['placeholder' => 'Adresse e-mail',
                'class' => 'contact_form_input']])
            ->add('company', TextType::class, ['attr' => ['placeholder' => 'Société',
                'class' => 'contact_form_input']])
            ->add('message', TextareaType::class, ['attr' => ['placeholder' => 'Message',
                'class' => 'contact_form_message']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
