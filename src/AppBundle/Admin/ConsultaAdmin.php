<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 5/17/2016
 * Time: 10:23 PM
 */

namespace AppBundle\Admin;

use AppBundle\Form\Type;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class ConsultaAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('servicio')
            ->add('fecha', 'datetime')
            ->add('paciente')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('servicio')
            ->add('fecha')
            ->add('paciente')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('fecha')
            ->add('servicio')
            ->add('paciente');
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('servicio')
            ->add('fecha')
            ->add('paciente')
        ;
    }
}