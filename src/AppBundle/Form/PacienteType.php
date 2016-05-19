<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PacienteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('nombre',null , array('required' => 'true'))
            ->add('primerApellido',null , array('required' => 'true'))
            ->add('segundoApellido',null , array('required' => 'true'))
            ->add('sexo')
            ->add('fechaNacimiento', 'text', array('attr' => array('data-inputmask'=>"'alias': 'dd/mm/yyyy'",'data-mask'=>''), 'required' => 'true'))
            ->add('cId', 'text', array('attr' => array('data-inputmask'=>"'mask': '99999999999'",'data-mask'=>''), 'required' => 'true'))
            ->add('colorPiel')
            ->add('estadoConyugal')
            ->add('paisNacimiento')
            ->add('provinciaNacimiento')
            ->add('municipioNacimiento')
            ->add('telefono')
            ->add('direccionCalle')
            ->add('direccionCasaNo')
            ->add('direccionEntreCalles')
            ->add('direccionLocalidad')
            ->add('direccionMunicipio')
            ->add('direccionProvincia')
            ->add('nombreCentroTrabajo')
            ->add('direccionCentroTrabajo')
            ->add('EmergenciasNombre')
            ->add('EmergenciasPrimerApellido')
            ->add('EmergenciasSegundoApellido')
            ->add('Emergenciastelefono')
            ->add('emergenciasDireccionCalle')
            ->add('emergenciasDireccionCasaNo')
            ->add('emergenciasDireccionEntreCalles')
            ->add('emergenciasDireccionLocalidad')
            ->add('emergenciasDireccionMunicipio')
            ->add('emergenciasDireccionProvincia')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Paciente'
        ));
    }
}
