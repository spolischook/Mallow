<?php

namespace Spolischook\RealEstateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Settlement
 *
 * @ORM\Table(name="city")
 * @ORM\Entity
 */
class City
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

    /**
     * @var string
     *
     * @ORM\Column(name="city_type", type="string", columnDefinition="ENUM('city', 'village', 'urban_village')", nullable=false)
     */
    private $type;

    /** @ORM\OneToMany(targetEntity="RealEstate", mappedBy="city") */
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
     * @return Settlement
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
     * @return City
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

    /**
     * Set type
     *
     * @param string $type
     * @return City
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    public function __toString()
    {
        return $this->name ? $this->name : 'city';
    }
}
