<?php
namespace Spolischook\RealEstateBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class CityAdmin extends Admin
{
    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('type', 'choice', array(
                    'choices'   => array(
                        'city'   => 'city',
                        'village' => 'village',
                        'urban_village'   => 'urban_village',
                    ),
                    'label' => 'sonata.name')
            )
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, array('label' => 'sonata.name'))
            ->add('type', null, array('label' => 'sonata.type'))
        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('type', 'doctrine_orm_string', array(), 'choice', array('choices' => array(
                'city'   => 'city',
                'village' => 'village',
                'urban_village'   => 'urban_village',
            )))
        ;
    }
}