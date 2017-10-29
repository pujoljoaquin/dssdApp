<?php

namespace Acme\BonitaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SiniestroType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder->add('nroCliente', 'integer', array('label' => 'Numero de Cliente', 'required' => true));
       $builder->add('tipoIncidenteId', 'entity', array('label' => 'Tipo de Incidente', 'class' => 'AcmeBonitaBundle:TipoIncidente', 'property' => 'tipoIncidente'));
       $builder->add('fechaIncidente', 'date', array('label' => 'Fecha', 'widget' => 'single_text'));
       $builder->add('descripcionSiniestro', 'text', array('label' => 'Descripcion del siniestro', 'required' => true, 'attr' => array('placeholder' => 'Descripcion')));
       $builder->add('cantidadObjetosIndemnizacion','hidden');
    }

   /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\BonitaBundle\Entity\Siniestro'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_bonitabundle_siniestro';
    }
}
