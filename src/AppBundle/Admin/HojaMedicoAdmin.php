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

class HojaMedicoAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('historiaEnfermedadActual')
            ->add('examenFisico')
            ->add('evolucionTratamiento')
            ->add('tratamientoAntibioticos')
            ->add('doctor')
            ->add('residente')
            ->add('ingreso')
            ->add('consulta')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('historiaEnfermedadActual')
            ->add('examenFisico')
            ->add('evolucionTratamiento')
            ->add('tratamientoAntibioticos')
            ->add('doctor')
            ->add('residente')
            ->add('ingreso')
            ->add('consulta')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('ingreso')
            ->addIdentifier('consulta')
            ->add('historiaEnfermedadActual')
            ->add('examenFisico')
            ->add('evolucionTratamiento')
            ->add('tratamientoAntibioticos')
            ->add('doctor')
            ->add('residente')

            ;
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('historiaEnfermedadActual')
            ->add('examenFisico')
            ->add('evolucionTratamiento')
            ->add('tratamientoAntibioticos')
            ->add('doctor')
            ->add('residente')
            ->add('ingreso')
            ->add('consulta')
        ;
    }
}