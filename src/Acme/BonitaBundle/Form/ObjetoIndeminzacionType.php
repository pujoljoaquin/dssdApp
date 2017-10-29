<?php

namespace Acme\BonitaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ObjetoIndeminzacionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre', 'text', 'required' => true, 'attr' => array('placeholder' => 'Nombre')));
        $builder->add('cantidad', 'integer', array('label' => 'Cantidad', 'required' => true));
        $builder->add('descripcion', 'text', 'attr' => array('placeholder' => 'Descripcion')));
        $builder->add('stock','hidden');

    }

   /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\BonitaBundle\Entity\ObjetoIndemnizacion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_bonitabundle_objetoIndemnizacion';
    }
}
