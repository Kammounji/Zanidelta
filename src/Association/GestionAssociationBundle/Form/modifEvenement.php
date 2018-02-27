<?php
/**
 * Created by PhpStorm.
 * User: iheb bf
 * Date: 2/17/2018
 * Time: 5:11 PM
 */

namespace Association\GestionAssociationBundle\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class modifEvenement extends  AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


      $builder
       ->add('etat',ChoiceType::class,array('choices'=>array('non autorise'=>false,'autorise'=>true)
        ))
            ->add('modifier',SubmitType::class);

    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Association\GestionAssociationBundle\Entity\Evenement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'association_gestionassociationbundle_evenement';
    }


}