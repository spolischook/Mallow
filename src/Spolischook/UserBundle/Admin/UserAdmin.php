<?php
namespace Spolischook\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class UserAdmin extends Admin
{
    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name', null, array('label' => 'user_full_name'))
            ->add('phone1', null, array('label' => 'phone'))
            ->add('phone2', null, array('label' => 'phone'))
            ->add('phone3', null, array('label' => 'phone'))
        ;
    }

    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array('label' => 'user_full_name'))
            ->add('phone1', null, array('label' => 'phone'))
            ->add('phone2', null, array('label' => 'phone'))
            ->add('phone3', null, array('label' => 'phone'))
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, array('label' => 'user_full_name'))
            ->add('phone1', null, array('label' => 'phone'))
            ->add('phone2', null, array('label' => 'phone'))
            ->add('phone3', null, array('label' => 'phone'))
        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
    }
}