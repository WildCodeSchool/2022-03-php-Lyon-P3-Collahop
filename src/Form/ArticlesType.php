<?php

namespace App\Form;

use App\Entity\Articles;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Titre'])
            ->add('image', TextType::class, ['label' => 'Images'])
            ->add('articleSumary', TextType::class, array (
                'label' => 'Résumé',
                'attr' => array(
                    'class' => 'article-input-summary'
                )))
            ->add('articleContent', TextType::class, array (
                'label' => 'Contenu',
                'attr' => array(
                    'class' => 'article-input-content'
                )))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Articles::class,
        ]);
    }
}
