<?php
namespace Spolischook\RealEstateBundle\DataFixtures\ORM;

use Spolischook\RealEstateBundle\Entity\Region;
use Spolischook\RealEstateBundle\DataFixtures\AbstractLoad;

class LoadRegionData extends AbstractLoad
{
    public function __construct()
    {
        $this->setEntityName('region');
    }

    public function getNewObject()
    {
        return new Region();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 12;
    }
}