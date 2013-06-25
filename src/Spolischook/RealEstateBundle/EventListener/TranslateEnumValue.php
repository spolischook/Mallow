<?php

namespace Spolischook\RealEstateBundle\EventListener;

use Symfony\Component\Translation\Translator;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Spolischook\RealEstateBundle\Entity\RealEstate;
use Spolischook\RealEstateBundle\Entity\City;
use Spolischook\RealEstateBundle\Entity\Street;

class TranslateEnumValue
{
    private $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function postLoad(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof RealEstate) {
            $entity->setRepair($this->translator->trans($entity->getRepair()));
        }

        if ($entity instanceof City) {
            $entity->setType($this->translator->trans($entity->getType()));
        }

        if ($entity instanceof Street) {
            $entity->setType($this->translator->trans($entity->getType()));
        }
    }
}