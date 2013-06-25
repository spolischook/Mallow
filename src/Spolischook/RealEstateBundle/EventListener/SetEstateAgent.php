<?php

namespace Spolischook\RealEstateBundle\EventListener;

use Symfony\Component\DependencyInjection\Container;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Spolischook\RealEstateBundle\Entity\RealEstate;

class SetEstateAgent
{
    /** @var  Container */
    private $container;

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof RealEstate && !$entity->getAgent()) {
            $entity->setAgent($this->getUser());
        }
    }

    public function setContainer(Container $container)
    {
        $this->container = $container;
    }

    private function getUser()
    {
        return $this->container->get('security.context')->getToken()->getUser();
    }
}