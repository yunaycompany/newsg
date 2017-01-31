<?php

namespace SIGE\DataEntryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModeloType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nombredescriptivo')
                ->add('idnummodelo')
                ->add('idsubnummodelo')
                ->add('codvariante')
                ->add('fechadelinformeacumulado')
//                ->add('anno')
//                ->add('mes')
//                ->add('dia')
                ->add('centroinformante')
                ->add('fechadeconfeccion')
                ->add('observaciones')
                ->add('estado')
//                ->add('acotaciones')
//                ->add('validaciones')
                ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'SIGE\DataEntryBundle\Entity\Modelo',
            'csrf_protection' => false
        ));
    }

}
