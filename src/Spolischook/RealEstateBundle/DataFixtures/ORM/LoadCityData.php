<?php
namespace Spolischook\RealEstateBundle\DataFixtures\ORM;

use Spolischook\RealEstateBundle\Entity\City;
use Spolischook\RealEstateBundle\DataFixtures\AbstractLoad;

class LoadCityData extends AbstractLoad
{
    public function __construct()
    {
        $this->setEntityName('city');
    }

    public function getNewObject()
    {
        return new City();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 13;
    }
}