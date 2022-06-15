<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, array (
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Prénom',
                    'class' => 'contact_form_input'
                )))

            ->add('lastname', TextType::class, array (
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Nom',
                    'class' => 'contact_form_input'
                )))

            ->add('email', EmailType::class, array (
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Adresse e-mail',
                    'class' => 'contact_form_input'
                )))

            ->add('company', TextType::class, array (
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Société',
                    'class' => 'contact_form_input'
                )))

            ->add('message', TextareaType::class, array (
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Votre message',
                    'class' => 'contact_form_area',
                    'rows' => 10
                )))

            ->add('send', SubmitType::class, array (
                'label' => 'Envoyer',
                'attr' => array(
                    'class' => 'contact_form_btn btn button button-2 fs-4 mt-4',
                )));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
