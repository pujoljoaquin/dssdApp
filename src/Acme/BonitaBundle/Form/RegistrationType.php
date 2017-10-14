<?php

namespace Acme\BonitaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // parent::buildForm($builder, $options);
       $builder->add('nombre', 'text', array('label' => 'Nombre', 'required' => true, 'pattern' => '[a-zA-Z]+', 'attr' => array('placeholder' => 'Solo se permiten letras')));
            //->add('iduser')   
       $builder->add('apellido', 'text', array('required' => true, 'required' => true, 'pattern' => '[a-zA-Z]+', 'attr' => array('placeholder' => 'Solo se permiten letras')));
       $builder->add('documento', 'text', array('required' => true, 'pattern' => '[0-9]+', 'attr' => array('placeholder' => 'Solo se permiten numeros')));
       $builder->add('tipoEmpleadoId', 'entity', array('label' => 'Tipo de Empleado', 'class' => 'AcmeBonitaBundle:TipoEmpleado', 'property' => 'tipoEmpleado'));
    }
    
   public function getParent()
 
   {
       return 'fos_user_registration';
   }
 
   public function getBlockPrefix()
 
   {
       return 'app_user_registration';
   }
 
   public function getName()
 
   {
       return $this->getBlockPrefix();
   }
}
