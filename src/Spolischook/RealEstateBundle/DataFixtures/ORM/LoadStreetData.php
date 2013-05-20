<?php
namespace Spolischook\RealEstateBundle\DataFixtures\ORM;

use Spolischook\RealEstateBundle\Entity\Street;
use Spolischook\RealEstateBundle\DataFixtures\AbstractLoad;

class LoadStreetData extends AbstractLoad
{
    public function __construct()
    {
        $this->setEntityName('street');
    }

    public function getNewObject()
    {
        return new Street();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 11;
    }
}