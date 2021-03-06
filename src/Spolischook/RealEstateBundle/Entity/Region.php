<?php

namespace Spolischook\RealEstateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Region
 *
 * @ORM\Table(name="region")
 * @ORM\Entity
 */
class Region
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /** @ORM\OneToMany(targetEntity="RealEstate", mappedBy="region") */
    private $realEstates;

    public function __construct() {
        $this->realEstates = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Region
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add realEstates
     *
     * @param \Spolischook\RealEstateBundle\Entity\RealEstate $realEstates
     * @return Region
     */
    public function addRealEstate(\Spolischook\RealEstateBundle\Entity\RealEstate $realEstates)
    {
        $this->realEstates[] = $realEstates;

        return $this;
    }

    /**
     * Remove realEstates
     *
     * @param \Spolischook\RealEstateBundle\Entity\RealEstate $realEstates
     */
    public function removeRealEstate(\Spolischook\RealEstateBundle\Entity\RealEstate $realEstates)
    {
        $this->realEstates->removeElement($realEstates);
    }

    /**
     * Get realEstates
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRealEstates()
    {
        return $this->realEstates;
    }

    public function __toString()
    {
        return $this->name ? $this->name : 'region';
    }
}
