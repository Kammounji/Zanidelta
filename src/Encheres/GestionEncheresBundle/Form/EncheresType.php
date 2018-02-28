<?php

namespace Encheres\GestionEncheresBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class EncheresType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label')
            ->add('image',FileType::class, array('label' => 'Image(JPG)'))
            ->add('categorie',ChoiceType::class,array("choices"=>array(
                "chat"=>'chat',
                "chien"=>'chien',
                "oiseaa"=>'oiseau',
                "produit alimentaire"=>'produit',
                "accessoires"=>'accessoires'
            ),))
            ->add('poid',TextType::class)
            ->add('caracteristiques',TextareaType::class)
            ->add('description',TextareaType::class)
            ->add('sexe',ChoiceType::class,array("choices"=>array(
                "male"=>'male',
                "femele"=>'femele',
            ),))
            ->add('age',TextType::class)
            ->add('dateDebut',DateTimeType::class)
            ->add('seuilMise',MoneyType::class)
            ->add('idProprietaire',HiddenType::class)
            ->add('ajouter',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => null
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'encheres_gestionencheresbundle_encheres';
    }


}
