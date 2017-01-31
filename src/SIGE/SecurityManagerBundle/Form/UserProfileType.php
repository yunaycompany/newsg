<?php

namespace SIGE\SecurityManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use \Symfony\Component\Form\Extension\Core\Type;

class UserProfileType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('id')
                ->add('failedLogin')
                ->add('passwordModifyAt', Type\DateTimeType::class, array(
                    'widget' => 'single_text',
                    'data' => new \DateTime("now")))
                ->add('changePasswordRequired')
                ->add('lastIp')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'SIGE\SecurityManagerBundle\Entity\UserProfile',
            'csrf_protection' => false
        ));
    }

}
