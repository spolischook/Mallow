<?php

namespace Spolischook\RealEstateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Spolischook\MediaBundle\Entity\Image;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * RealEstate
 *
 * @ORM\Table(name="real_estate")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity
 */
class RealEstate
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
     * @ORM\Column(name="priceUah", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="house", type="integer")
     */
    private $house;

    /**
     * @var integer
     *
     * @ORM\Column(name="fraction", type="integer", nullable=true)
     */
    private $fraction;

    /**
     * @var integer
     *
     * @ORM\Column(name="room", type="integer", nullable=true)
     */
    private $room;

    /**
     * @var integer
     *
     * @ORM\Column(name="space", type="integer", nullable=true)
     */
    private $space;

    /**
     * @var integer
     *
     * @ORM\Column(name="living_space", type="integer", nullable=true)
     */
    private $livingSpace;

    /**
     * @var integer
     *
     * @ORM\Column(name="kitchen_space", type="integer", nullable=true)
     */
    private $kitchenSpace;

    /**
     * @var integer
     *
     * @ORM\Column(name="land_space", type="integer", nullable=true)
     */
    private $landSpace;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_floors", type="integer", nullable=true)
     */
    private $nbFloors;

    /**
     * @var integer
     *
     * @ORM\Column(name="floor", type="integer", nullable=true)
     */
    private $floor;

    /**
     * @var string
     *
     * @ORM\Column(name="building_material", type="string", columnDefinition="ENUM('brick', 'monolith', 'prefabricated', 'shells', 'clay_brick', 'wood_brick')", nullable=false)
     */
    private $buildingMaterial;

    /**
     * @var string
     *
     * @ORM\Column(name="repair", type="string", columnDefinition="ENUM('no_repair', 'prepared_under_repair', 'residential_status', 'redecorating', 'renovation', 'super_repair')", nullable=false)
     */
    private $repair;

    /**
     * @var integer
     *
     * @ORM\Column(name="price_usd", type="integer")
     */
    private $priceUsd;

    /**
     * @var string
     *
     * @ORM\Column(name="chaffer", type="boolean", nullable=true)
     */
    private $chaffer;

    /**
     * @var boolean
     *
     * @ORM\Column(name="in_stock", type="boolean", nullable=true)
     */
    private $inStock;

    /**
     * @var boolean
     *
     * @ORM\Column(name="urgently", type="boolean", nullable=true)
     */
    private $urgently;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="description_ad", type="text", nullable=true)
     */
    private $descriptionAd;

    /** @ORM\ManyToOne(targetEntity="Category", inversedBy="realEstates") */
    private $category;

    /** @ORM\ManyToOne(targetEntity="TypeEstate", inversedBy="realEstates") */
    private $typeEstate;

    /** @ORM\ManyToOne(targetEntity="City", inversedBy="realEstates") */
    private $city;

    /** @ORM\ManyToOne(targetEntity="Region", inversedBy="realEstates") */
    private $region;

    /** @ORM\ManyToOne(targetEntity="Street", inversedBy="realEstates") */
    private $street;

    /** @ORM\OneToMany(targetEntity="\Spolischook\MediaBundle\Entity\Image", mappedBy="realEstate", cascade={"all"}, orphanRemoval=true) */
    private $images;

    /** @ORM\ManyToOne(targetEntity="\Spolischook\UserBundle\Entity\Client", inversedBy="realEstate") */
    private $client;

    /** @ORM\ManyToOne(targetEntity="\Spolischook\UserBundle\Entity\User") */
    private $agent;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new ArrayCollection();
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
     * Set house
     *
     * @param integer $house
     * @return RealEstate
     */
    public function setHouse($house)
    {
        $this->house = $house;

        return $this;
    }

    /**
     * Get house
     *
     * @return integer 
     */
    public function getHouse()
    {
        return $this->house;
    }

    /**
     * Set fraction
     *
     * @param integer $fraction
     * @return RealEstate
     */
    public function setFraction($fraction)
    {
        $this->fraction = $fraction;

        return $this;
    }

    /**
     * Get fraction
     *
     * @return integer 
     */
    public function getFraction()
    {
        return $this->fraction;
    }

    /**
     * Set room
     *
     * @param integer $room
     * @return RealEstate
     */
    public function setRoom($room)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * Get room
     *
     * @return integer 
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * Set space
     *
     * @param integer $space
     * @return RealEstate
     */
    public function setSpace($space)
    {
        $this->space = $space;

        return $this;
    }

    /**
     * Get space
     *
     * @return integer 
     */
    public function getSpace()
    {
        return $this->space;
    }

    /**
     * Set livingSpace
     *
     * @param integer $livingSpace
     * @return RealEstate
     */
    public function setLivingSpace($livingSpace)
    {
        $this->livingSpace = $livingSpace;

        return $this;
    }

    /**
     * Get livingSpace
     *
     * @return integer 
     */
    public function getLivingSpace()
    {
        return $this->livingSpace;
    }

    /**
     * Set kitchenSpace
     *
     * @param integer $kitchenSpace
     * @return RealEstate
     */
    public function setKitchenSpace($kitchenSpace)
    {
        $this->kitchenSpace = $kitchenSpace;

        return $this;
    }

    /**
     * Get kitchenSpace
     *
     * @return integer 
     */
    public function getKitchenSpace()
    {
        return $this->kitchenSpace;
    }

    /**
     * Set landSpace
     *
     * @param integer $landSpace
     * @return RealEstate
     */
    public function setLandSpace($landSpace)
    {
        $this->landSpace = $landSpace;

        return $this;
    }

    /**
     * Get landSpace
     *
     * @return integer 
     */
    public function getLandSpace()
    {
        return $this->landSpace;
    }

    /**
     * Set nbFloors
     *
     * @param integer $nbFloors
     * @return RealEstate
     */
    public function setNbFloors($nbFloors)
    {
        $this->nbFloors = $nbFloors;

        return $this;
    }

    /**
     * Get nbFloors
     *
     * @return integer 
     */
    public function getNbFloors()
    {
        return $this->nbFloors;
    }

    /**
     * Set floor
     *
     * @param integer $floor
     * @return RealEstate
     */
    public function setFloor($floor)
    {
        $this->floor = $floor;

        return $this;
    }

    /**
     * Get floor
     *
     * @return integer 
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * Set buildingMaterial
     *
     * @param string $buildingMaterial
     * @return RealEstate
     */
    public function setBuildingMaterial($buildingMaterial)
    {
        $this->buildingMaterial = $buildingMaterial;

        return $this;
    }

    /**
     * Get buildingMaterial
     *
     * @return string 
     */
    public function getBuildingMaterial()
    {
        return $this->buildingMaterial;
    }

    /**
     * Set repair
     *
     * @param string $repair
     * @return RealEstate
     */
    public function setRepair($repair)
    {
        $this->repair = $repair;

        return $this;
    }

    /**
     * Get repair
     *
     * @return string 
     */
    public function getRepair()
    {
        return $this->repair;
    }

    /**
     * Set priceUsd
     *
     * @param integer $priceUsd
     * @return RealEstate
     */
    public function setPriceUsd($priceUsd)
    {
        $this->priceUsd = $priceUsd;

        return $this;
    }

    /**
     * Get priceUsd
     *
     * @return integer 
     */
    public function getPriceUsd()
    {
        return $this->priceUsd;
    }

    /**
     * Set priceUah
     *
     * @param string $priceUah
     * @return RealEstate
     */
    public function setPriceUah($priceUah)
    {
        $this->priceUah = $priceUah;

        return $this;
    }

    /**
     * Get priceUah
     *
     * @return string 
     */
    public function getPriceUah()
    {
        return $this->priceUah;
    }

    /**
     * Set chaffer
     *
     * @param string $chaffer
     * @return RealEstate
     */
    public function setChaffer($chaffer)
    {
        $this->chaffer = $chaffer;

        return $this;
    }

    /**
     * Get chaffer
     *
     * @return string 
     */
    public function getChaffer()
    {
        return $this->chaffer;
    }

    /**
     * Set inStock
     *
     * @param boolean $inStock
     * @return RealEstate
     */
    public function setInStock($inStock)
    {
        $this->inStock = $inStock;

        return $this;
    }

    /**
     * Get inStock
     *
     * @return boolean 
     */
    public function getInStock()
    {
        return $this->inStock;
    }

    /**
     * Set urgently
     *
     * @param boolean $urgently
     * @return RealEstate
     */
    public function setUrgently($urgently)
    {
        $this->urgently = $urgently;

        return $this;
    }

    /**
     * Get urgently
     *
     * @return boolean 
     */
    public function getUrgently()
    {
        return $this->urgently;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return RealEstate
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set descriptionAd
     *
     * @param string $descriptionAd
     * @return RealEstate
     */
    public function setDescriptionAd($descriptionAd)
    {
        $this->descriptionAd = $descriptionAd;

        return $this;
    }

    /**
     * Get descriptionAd
     *
     * @return string 
     */
    public function getDescriptionAd()
    {
        return $this->descriptionAd;
    }

    /**
     * Set typeEstate
     *
     * @param \Spolischook\RealEstateBundle\Entity\TypeEstate $typeEstate
     * @return RealEstate
     */
    public function setTypeEstate(\Spolischook\RealEstateBundle\Entity\TypeEstate $typeEstate = null)
    {
        $this->typeEstate = $typeEstate;

        return $this;
    }

    /**
     * Get typeEstate
     *
     * @return \Spolischook\RealEstateBundle\Entity\TypeEstate 
     */
    public function getTypeEstate()
    {
        return $this->typeEstate;
    }

    /**
     * Set city
     *
     * @param \Spolischook\RealEstateBundle\Entity\City $city
     * @return RealEstate
     */
    public function setCity(\Spolischook\RealEstateBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \Spolischook\RealEstateBundle\Entity\City 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set region
     *
     * @param \Spolischook\RealEstateBundle\Entity\Region $region
     * @return RealEstate
     */
    public function setRegion(\Spolischook\RealEstateBundle\Entity\Region $region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return \Spolischook\RealEstateBundle\Entity\Region 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set street
     *
     * @param \Spolischook\RealEstateBundle\Entity\Street $street
     * @return RealEstate
     */
    public function setStreet(\Spolischook\RealEstateBundle\Entity\Street $street = null)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return \Spolischook\RealEstateBundle\Entity\Street 
     */
    public function getStreet()
    {
        return $this->street;
    }

    public function __toString()
    {
        return $this->name ? $this->name : 'real_estate_object';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return RealEstate
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function setNameIfNotIsset()
    {
        if ($this->name == null) {
            $this->name =
                $this->getTypeEstate()->getName() .', '.
                $this->getCity()->getName();
        }
    }

    /**
     * Add images
     *
     * @param \Spolischook\MediaBundle\Entity\Image $images
     * @return RealEstate
     */
    public function addImage(\Spolischook\MediaBundle\Entity\Image $images)
    {
        $this->images[] = $images;
        $images->setRealEstate($this);

        return $this;
    }

    /**
     * Remove images
     *
     * @param \Spolischook\MediaBundle\Entity\Image $images
     */
    public function removeImage(\Spolischook\MediaBundle\Entity\Image $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * @param mixed $agent
     */
    public function setAgent($agent)
    {
        $this->agent = $agent;
    }
}
