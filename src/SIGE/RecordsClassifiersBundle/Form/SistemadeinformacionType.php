<?php

namespace SIGE\RecordsClassifiersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SistemadeinformacionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id')
            ->add('alias')
            ->add('imagenlogo')
            ->add('tipodearchivo')
            ->add('denominacion')
            ->add('registros')
            ->add('indicadores')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SIGE\RecordsClassifiersBundle\Entity\Sistemadeinformacion',
            'csrf_protection' => false
        ));
    }
}
