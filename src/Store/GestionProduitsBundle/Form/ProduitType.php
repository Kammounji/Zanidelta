<?php

namespace Store\GestionProduitsBundle\Form;

use blackknight467\StarRatingBundle\Form\RatingType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idCategorie',EntityType::class, array('class'=>'Association\GestionAssociationBundle\Entity\Categorie','choice_label'=>'nom'))
            ->add('caracteristiques')
            ->add('description')
            ->add('file')
            ->add('poid')
            ->add('prixNouv')
            ->add('quantite')
            ;

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Store\GestionProduitsBundle\Entity\Produit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'store_gestionproduitsbundle_produit';
    }


}
