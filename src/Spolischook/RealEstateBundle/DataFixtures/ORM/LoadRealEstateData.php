<?php
namespace Spolischook\RealEstateBundle\DataFixtures\ORM;

use Spolischook\RealEstateBundle\Entity\RealEstate;
use Spolischook\RealEstateBundle\DataFixtures\AbstractLoad;

class LoadRealEstateData extends AbstractLoad
{
    public function __construct()
    {
        $this->setEntityName('realEstate');
    }

    public function getNewObject()
    {
        return new RealEstate();
    }


    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 16;
    }
}