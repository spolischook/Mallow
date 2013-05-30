<?php
namespace Spolischook\UserBundle\DataFixtures\ORM;

use Spolischook\UserBundle\Entity\User;
use Spolischook\UserBundle\DataFixtures\AbstractLoad;

class LoadUserData extends AbstractLoad
{
    public function __construct()
    {
        $this->setEntityName('user');
    }

    public function getNewObject()
    {
        return new User();
    }


    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 0;
    }
}