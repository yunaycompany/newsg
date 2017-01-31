<?php

namespace SIGE\SecurityManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LdapConnectionsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ldapname')
            ->add('host')
            ->add('port')
            ->add('account')
            ->add('password')
            ->add('basedn')
            ->add('username')
            ->add('name')
            ->add('surname')
            ->add('email')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SIGE\SecurityManagerBundle\Entity\LdapConnections',
              'csrf_protection' => false
        ));
    }
}
