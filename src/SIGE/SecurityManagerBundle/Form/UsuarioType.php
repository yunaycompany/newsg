<?php

namespace SIGE\SecurityManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use \Symfony\Component\Form\Extension\Core\Type;
use \SIGE\SecurityManagerBundle\Entity\IpAddress;
use \SIGE\SecurityManagerBundle\Entity\OldPassword;
use \SIGE\SecurityManagerBundle\Entity\Rol;
use \SIGE\SecurityManagerBundle\Entity\Permiso;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UsuarioType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('id')
                ->add('username')
                ->add('password')
                ->add('name')
                ->add('surname')
                ->add('email')
                ->add('status')
                ->add('updatedOn', Type\DateTimeType::class, array(
                    'widget' => 'single_text',
                    'data' => new \DateTime("now")))
                ->add('ldap')
                ->add('dn')
                ->add('online')
                ->add('lastAction', Type\DateTimeType::class, array(
                    'widget' => 'single_text',
                    'data' => new \DateTime("now")))
                ->add('authType')
                ->add('userProfile', UserProfileType::class)
                ->add('ipAddress', 'collection', array(
                    'type' => IpAddressType::class,
                    'by_reference' => false,
                    'prototype_data' => new IpAddress(),
                    'allow_delete' => true,
                    'allow_add' => true
                ))
                ->add('oldPassword', 'collection', array(
                    'type' => OldPasswordType::class,
                    'by_reference' => false,
                    'prototype_data' => new OldPassword(),
                    'allow_delete' => true,
                    'allow_add' => true
                ))
                ->add('permisos', 'collection', array(
                    'type' => PermisoType::class,
                    'by_reference' => false,
                    'prototype_data' => new Permiso(),
                    'allow_delete' => true,
                    'allow_add' => true
                ))
                ->add('roles', 'collection', array(
                    'type' => RolType::class,
                    'by_reference' => false,
                    'prototype_data' => new Rol(),
                    'allow_delete' => true,
                    'allow_add' => true
                ))

        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'SIGE\SecurityManagerBundle\Entity\Usuario',
            'csrf_protection' => false
        ));
    }

}
