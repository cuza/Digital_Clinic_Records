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

class HojaEnfermeria2Admin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('liquido')
            ->add('deposiciones')
            ->add('orina')
            ->add('date', 'date')
            ->add('enfermero')
            ->add('ingreso')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('liquido')
            ->add('deposiciones')
            ->add('orina')
            ->add('date')
            ->add('enfermero')
            ->add('ingreso')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('date')
            ->add('liquido')
            ->add('deposiciones')
            ->add('orina')
            ->add('enfermero')
            ->add('ingreso')
            ;
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('liquido')
            ->add('deposiciones')
            ->add('orina')
            ->add('date')
            ->add('enfermero')
            ->add('ingreso')
        ;
    }
}