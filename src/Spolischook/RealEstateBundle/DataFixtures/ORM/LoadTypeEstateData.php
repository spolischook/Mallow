<?php
namespace Spolischook\RealEstateBundle\DataFixtures\ORM;

use Spolischook\RealEstateBundle\Entity\TypeEstate;
use Spolischook\RealEstateBundle\DataFixtures\AbstractLoad;

class LoadTypeEstateData extends AbstractLoad
{
    public function __construct()
    {
        $this->setEntityName('typeEstate');
    }

    public function getNewObject()
    {
        return new TypeEstate();
    }


    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 15;
    }
}