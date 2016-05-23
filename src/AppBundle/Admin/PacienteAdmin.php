<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 5/17/2016
 * Time: 10:23 PM
 */

namespace AppBundle\Admin;

use AppBundle\Form\Type\GenderType;
use AppBundle\Form\Type\SkinType;
use AppBundle\Form\Type\CivilStateType;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class PacienteAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nombre', 'text', array('required' => true))
            ->add('primerApellido', 'text', array('required' => true, 'label' => '1er Apellido'))
            ->add('segundoApellido', 'text', array('required' => true, 'label' => '2do Apellido'))
            ->add('sexo', GenderType::class)
            ->add('fechaNacimiento', 'date', array('widget' => 'single_text', 'required' => true, 'label' => 'Fecha de nacimiento'))
            ->add('cId', 'text', array('attr' => array('data-inputmask' => "'mask': '99999999999'", 'data-mask' => '', 'placeholder' => 'Carnet de Identidad'), 'label' => 'CI', 'required' => true))
            ->add('colorPiel', SkinType::class, array('label' => 'Color de piel'))
            ->add('estadoConyugal', CivilStateType::class)
//            ->add('paisNacimiento','text' , array('label' => 'País de nacimiento'))
//            ->add('provinciaNacimiento','text' , array('label' => 'Provincia de nacimiento'))
//            ->add('municipioNacimiento','text' , array('label' => 'Municipio de nacimiento'))
            ->add('telefono', 'text', array('label' => 'Teléfono', 'attr' => array('data-inputmask' => "'mask': '+53-#-###-####'", 'data-mask' => '+53########'), 'required' => false))
            ->add('direccionCalle', 'text', array('label' => 'Calle', 'required' => false))
            ->add('direccionCasaNo', 'text', array('label' => 'No.', 'required' => false))
            ->add('direccionEntreCalles', 'text', array('label' => 'Entre calles', 'required' => false))
            ->add('direccionLocalidad', 'text', array('label' => 'Localidad', 'required' => false))
            ->add('direccionMunicipio', 'text', array('label' => 'Municipio', 'required' => false))
            ->add('direccionProvincia', 'text', array('label' => 'Provincia', 'required' => false))
            ->add('nombreCentroTrabajo', 'text', array('label' => 'Centro de trabajo', 'required' => false))
            ->add('direccionCentroTrabajo', 'text', array('label' => 'Dirección del mismo', 'required' => false))
            ->add('EmergenciasNombre', 'text', array('label' => 'Nombre', 'required' => false))
            ->add('EmergenciasPrimerApellido', 'text', array('label' => '1er Apellido', 'required' => false))
            ->add('EmergenciasSegundoApellido', 'text', array('label' => '2do Apellido', 'required' => false))
            ->add('Emergenciastelefono', 'text', array('label' => 'Teléfono', 'attr' => array('data-inputmask' => "'mask': '+53-#-###-####'", 'data-mask' => '+53########'), 'required' => false))
            ->add('emergenciasDireccionCalle', 'text', array('label' => 'Calle', 'required' => false))
            ->add('emergenciasDireccionCasaNo', 'text', array('label' => 'No.', 'required' => false))
            ->add('emergenciasDireccionEntreCalles', 'text', array('label' => 'Entre calles', 'required' => false))
            ->add('emergenciasDireccionLocalidad', 'text', array('label' => 'Localidad', 'required' => false))
            ->add('emergenciasDireccionMunicipio', 'text', array('label' => 'Municipio', 'required' => false))
            ->add('emergenciasDireccionProvincia', 'text', array('label' => 'Provincia', 'required' => false));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombre')
            ->add('primerApellido')
            ->add('segundoApellido')
            ->add('sexo')
            ->add('fechaNacimiento')
            ->add('cId')
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
            ->add('emergenciasDireccionProvincia');
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('cId')
            ->add('nombre')
            ->add('primerApellido')
            ->add('segundoApellido')
            ->add('sexo')
            ->add('fechaNacimiento')
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
            ->add('emergenciasDireccionProvincia');
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('nombre')
            ->add('primerApellido')
            ->add('segundoApellido')
            ->add('sexo')
            ->add('fechaNacimiento', 'datetime')
            ->add('cId')
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
            ->add('emergenciasDireccionProvincia');
    }
}