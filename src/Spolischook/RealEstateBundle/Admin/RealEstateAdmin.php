<?php
namespace Spolischook\RealEstateBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\SecurityContext;

class RealEstateAdmin extends Admin
{
    /** @var  SecurityContext */
    protected $securityContext;

    protected $datagridValues = array(
        '_page'       => 1,
        '_per_page'   => 25,
        'inStock'     => array ('type' => 2, 'value' => 1),
    );

    public function configureShowFields(ShowMapper $showMapper)
    {
        if (!$this->isUserHavePermission()) {
            $this->getRoutes()->remove('edit');
            $this->getSubject()->setClientName($this->trans('contact_is_hidden'));
            $this->getSubject()->setClientContact($this->trans('contact_is_hidden'));
        }

        $showMapper
            ->add('name', null, array('label' => 'name'))
            ->add('typeEstate', null, array('label' => 'type_estate', 'route' => array('name' => 'show')))
            ->add('category', null, array('label' => 'category'))
            ->add('city', null, array('label' => 'city', 'route' => array('name' => 'show')))
            ->add('region', null, array('label' => 'region', 'route' => array('name' => 'show')))
            ->add('street', null, array('label' => 'street', 'route' => array('name' => 'show')))
            ->add('priceUsd', null, array('label' => 'price_usd'))
            ->add('nbFloors', null, array('label' => 'nb_floors'))
            ->add('floor', null, array('label' => 'floor'))
            ->add('space', null, array('label' => 'space'))
            ->add('repair', null, array('label' => 'repair'))
            ->add('clientName', null, array('label' => 'client_name', 'by_reference' => true))
            ->add('clientContact', null, array('label' => 'client_contact', 'by_reference' => true))
            ->add('agent', null, array('label' => 'agent', 'route' => array('name' => 'show')))
            ->add('description', null, array('label' => 'description'))
        ;
    }

    public function configureFormFields(FormMapper $formMapper)
    {
        if (!$this->isUserHavePermission()) {
            throw new \Exception($this->trans('you_have_no_permission_to_edit_this_estate'));
        }

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
                'label' => 'repair',
                'required'  => false,
                'choices'  => array(
                    'no_repair'             => $this->trans('no_repair'),
                    'prepared_under_repair' => $this->trans('prepared_under_repair'),
                    'residential_status'    => $this->trans('residential_status'),
                    'redecorating'          => $this->trans('redecorating'),
                    'renovation'            => $this->trans('renovation'),
                    'super_repair'          => $this->trans('super_repair'),
                )))
            ->add('clientName', null, array('label' => 'client_name', 'by_reference' => true))
            ->add('clientContact', null, array('label' => 'client_contact', 'by_reference' => true))
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
            ->addIdentifier('name', null, array('label' => 'name', 'route' => array('name' => 'show')))
            ->add('typeEstate', null, array('label' => 'type_estate'))
//            ->add('category', null, array('label' => 'category'))
            ->add('city', null, array('label' => 'city', 'route' => array('name' => 'show')))
            ->add('region', null, array('label' => 'region', 'route' => array('name' => 'show')))
            ->add('priceUsd', null, array('label' => 'price_usd'))
            ->add('nbFloors', null, array('label' => 'nb_floors'))
            ->add('floor', null, array('label' => 'floor'))
            ->add('space', null, array('label' => 'space'))
            ->add('repair', null, array('label' => 'repair'))
            ->add('agent', null, array('label' => 'agent', 'route' => array('name' => 'show')))
            ->add('inStock', null, array('label' => 'in_stock', 'data' => true))
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
            ->add('inStock', null, array('label' => 'in_stock'))
        ;
    }

    public function getExportFormats()
    {
        return array(
            'txt'
        );
    }

    public function setSecurityContext(SecurityContext $securityContext)
    {
        $this->securityContext = $securityContext;
    }

    public function isUserHavePermission()
    {

        $isUserIsOwner          = $this->getUser() == $this->getSubject()->getAgent();
        $isUserIsSuperAdmin     = $this->isAdmin();

        if (null != $this->getSubject()) {
            //CreateAction
            if (null === $this->getSubject()->getId()) {
                return true;
            }
            if ($isUserIsOwner || $isUserIsSuperAdmin) {
                return true;
            }
        }

        return false;
    }

    private function getUser()
    {
        return $this->securityContext->getToken()->getUser();
    }

    private function isAdmin()
    {
        return $this->securityContext->isGranted('ROLE_SUPER_ADMIN');
    }
}