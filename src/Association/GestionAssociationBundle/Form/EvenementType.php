<?php

namespace Association\GestionAssociationBundle\Form;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\CaptchaBundle\Type\CaptchaType;
use MyApp\UserBundle\Entity\User;

use SC\DatetimepickerBundle\Form\Type\DatetimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
            ->add('description')
            ->add('nbrParticipants')
            ->add('file')
            ->add('prix')

            ->add('dateDebut')
            ->add('heure_event')


            ->add('id_categorie',EntityType::class, array('class'=>'Association\GestionAssociationBundle\Entity\Categorie','choice_label'=>'nom'))
            ->add('captcha',CaptchaType::class,array('as_url'=>true,'reload'=>true,'quality'=>1000,'length'=>4,'invalid_message'=>'Veuillez verifier'))

   ->add('ajouter',SubmitType::class);
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
