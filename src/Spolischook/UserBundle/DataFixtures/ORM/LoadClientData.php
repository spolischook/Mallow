<?php
namespace Spolischook\UserBundle\DataFixtures\ORM;

use Spolischook\UserBundle\Entity\Client;
use Spolischook\UserBundle\DataFixtures\AbstractLoad;

class LoadClientData extends AbstractLoad
{
    public function __construct()
    {
        $this->setEntityName('client');
    }

    public function getNewObject()
    {
        return new Client();
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