<?php

namespace SIGE\RecordsClassifiersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CentroinformanteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id')
            ->add('nombredescriptivo')
            ->add('direccion')
            ->add('fechadecreacion')
            ->add('detalles')
            ->add('correo')
            ->add('telefono')
            ->add('longitud')
            ->add('latitud')
            ->add('estado')
            ->add('sistemadeinformacion')
            ->add('registro')
            ->add('codome')
            ->add('codote')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SIGE\RecordsClassifiersBundle\Entity\Centroinformante'
        ));
    }
}
