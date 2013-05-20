<?php

namespace Spolischook\RealEstateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Street
 *
 * @ORM\Table(name="street")
 * @ORM\Entity
 */
class Street
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
     * @ORM\Column(name="street_type", type="string", columnDefinition="ENUM('street', 'boulevard', 'prospectus', 'descent', 'backstreet')", nullable=false)
     */
    private $type;

    /** @ORM\OneToMany(targetEntity="RealEstate", mappedBy="street") */
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
     * @return Street
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
     * Set type
     *
     * @param string $type
     * @return Street
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

    /**
     * Add realEstates
     *
     * @param \Spolischook\RealEstateBundle\Entity\RealEstate $realEstates
     * @return Street
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
        return $this->name ? $this->name : 'street';
    }
}
