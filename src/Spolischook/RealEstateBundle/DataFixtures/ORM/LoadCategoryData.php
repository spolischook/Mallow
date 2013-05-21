<?php
namespace Spolischook\RealEstateBundle\DataFixtures\ORM;

use Spolischook\RealEstateBundle\Entity\Category;
use Spolischook\RealEstateBundle\DataFixtures\AbstractLoad;

class LoadCategoryData extends AbstractLoad
{
    public function __construct()
    {
        $this->setEntityName('category');
    }

    public function getNewObject()
    {
        return new Category();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 14;
    }
}