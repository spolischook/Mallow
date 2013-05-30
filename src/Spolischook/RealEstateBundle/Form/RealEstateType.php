<?php

namespace Spolischook\RealEstateBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RealEstateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('house')
            ->add('fraction')
            ->add('room')
            ->add('space')
            ->add('livingSpace')
            ->add('kitchenSpace')
            ->add('landSpace')
            ->add('nbFloors')
            ->add('floor')
            ->add('buildingMaterial')
            ->add('repair')
            ->add('priceUsd')
            ->add('priceUah')
            ->add('chaffer')
            ->add('inStock')
            ->add('urgently')
            ->add('description')
            ->add('descriptionAd')
            ->add('category')
            ->add('typeEstate')
            ->add('city')
            ->add('region')
            ->add('street')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Spolischook\RealEstateBundle\Entity\RealEstate'
        ));
    }

    public function getName()
    {
        return 'spolischook_realestatebundle_realestatetype';
    }
}
