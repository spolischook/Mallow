<?php
namespace Spolischook\RealEstateBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Doctrine\ORM\EntityRepository;

class RealEstateAdmin extends Admin
{
    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name', null, array('label' => 'sonata.name'))
            ->add('typeEstate')
        ;
    }

    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array('label' => 'name', 'attr' => array('class' => 'name')))
            ->add('typeEstate', null, array('label' => 'type_estate', 'required' => true, 'attr' => array('class' => 'type-estate')))
            ->add('category', 'entity', array(
                'label' => 'category',
                'required' => true,
                'property' => 'nameWithParent',
                'class' => 'RealEstateBundle:Category',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->select('c')
                        ->where('c.parent IS NOT NULL');
                },
            ))
            ->add('city', null, array('label'     => 'city', 'required' => true))
            ->add('region', null, array('label'   => 'region'))
            ->add('street', null, array('label'   => 'street'))
            ->add('house', null, array('label'    => 'house'))
            ->add('fraction', null, array('label' => '/'))
            ->add('room', null, array('label'     => 'room'))
            ->add('nbFloors', null, array('label' => 'nb_floors'))
            ->add('floor', null, array('label'    => 'floor'))
            ->add('buildingMaterial', 'choice', array(
                'label'     => 'building_material.title',
                'required'  => false,
                'choices'   => array(
                    'brick'         => 'building_material.brick',
                    'monolith'      => 'building_material.monolith',
                    'prefabricated' => 'building_material.prefabricated',
                    'shells'        => 'building_material.shells',
                    'clay_brick'    => 'building_material.clay_brick',
                    'wood_brick'    => 'building_material.wood_brick',
                )))
            ->add('space', 'integer', array('label' => 'space', 'help' => 'кв2', 'required' => false))
            ->add('livingSpace', 'integer', array('label' => 'living_space', 'required' => false))
            ->add('kitchenSpace', 'integer', array('label' => 'kitchen_space', 'required' => false))
            ->add('landSpace', 'integer', array('label' => 'land_space', 'required' => false))
            ->add('priceUsd', null, array('label' => 'price_usd', 'required' => true))
            ->add('chaffer', null, array('label' => 'chaffer'))
            ->add('urgently', null, array('label' => 'urgently'))
            ->add('inStock', null, array('label' => 'in_stock', 'data' => true))
            ->add('space', null, array('label' => 'space'))
            ->add('repair', 'choice', array(
                'label' => 'repair.title',
                'required'  => false,
                'choices'  => array(
                    'no_repair'             => $this->trans('repair.no_repair'),
                    'prepared_under_repair' => $this->trans('repair.prepared_under_repair'),
                    'residential_status'    => $this->trans('repair.residential_status'),
                    'redecorating'          => $this->trans('repair.redecorating'),
                    'renovation'            => $this->trans('repair.renovation'),
                    'super_repair'          => $this->trans('repair.super_repair'),
                )))
            ->add('client', null, array(
                'label' => 'client',
                'by_reference' => true
            ))
            ->add('description', null, array('label' => 'description'))
            ->add('descriptionAd', null, array('label' => 'description_ad'))
            ->add('images', 'sonata_type_collection',
                array('required' => false, 'by_reference' => false, 'label' => 'images'),
                array('edit' => 'inline', 'inline' => 'table')
            )
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, array('label' => 'name'))
            ->add('typeEstate', null, array('label' => 'type_estate'))
            ->add('category', null, array('label' => 'category'))
            ->add('city', null, array('label' => 'city'))
            ->add('region', null, array('label' => 'region'))
            ->add('priceUsd', null, array('label' => 'price_usd'))
            ->add('nbFloors', null, array('label' => 'nb_floors'))
            ->add('floor', null, array('label' => 'floor'))
            ->add('space', null, array('label' => 'space'))
            ->add('repair', null, array('label' => 'repair.title'))
        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label' => 'name'))
            ->add('typeEstate', null, array('label' => 'type_estate'))
            ->add('city', null, array('label' => 'city'))
            ->add('region', null, array('label' => 'region'))
            ->add('nbFloors', null, array('label' => 'nb_floors'))
            ->add('floor', null, array('label' => 'floor'))
        ;
    }
}