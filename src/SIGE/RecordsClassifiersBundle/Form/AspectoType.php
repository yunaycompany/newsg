<?php

namespace SIGE\RecordsClassifiersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AspectoType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('id')
                ->add('nombredescriptivo')
                ->add('notametodologica')
                ->add('aliassuperior')
                ->add('tematica')
                ->add('sistemasdeinformacion')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'SIGE\RecordsClassifiersBundle\Entity\Aspecto'
        ));
    }

}
