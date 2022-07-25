<?php

namespace App\Form;

use App\Entity\Peau;
use App\Entity\Produit;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('marque')
            ->add('description')
            ->add('photo', FileType::class, [
                "mapped" => false,
                "required" => false,
                "attr" => [
                    'class' => 'dropify',
                    'id'    => 'input-file-now-costom-1',
                    'for'   => 'input-file-now-costom-1'
                ]
            ])
            ->add('prix')
            ->add('stock')
            ->add('peau', EntityType::class, [
                    'class' => Peau::class, 
                    'choice_label'=> 'type'                
            ] )
            ->add('categorie', EntityType::class, [
                'class'=>Categorie::class,
                'choice_label'=> 'nom',
                'placeholder' => 'choisissez une catégorie'
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
