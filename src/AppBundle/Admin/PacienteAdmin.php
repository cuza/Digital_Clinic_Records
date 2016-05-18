<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 5/17/2016
 * Time: 10:23 PM
 */

namespace AppBundle\Admin;

use AppBundle\Form\GenderType;
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
            ->add('nombre')
            ->add('primerApellido')
            ->add('segundoApellido')
            ->add('sexo',GenderType::class)
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
            ->add('emergenciasDireccionProvincia')
        ;
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
            ->add('emergenciasDireccionProvincia')
        ;
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
            ->add('emergenciasDireccionProvincia')
            ;
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
            ->add('emergenciasDireccionProvincia')
        ;
    }
}