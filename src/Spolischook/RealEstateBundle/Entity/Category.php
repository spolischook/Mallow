<?php

namespace Spolischook\RealEstateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity
 */
class Category
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

    /** @ORM\OneToMany(targetEntity="Category", mappedBy="parent") */
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;

    public function __construct() {
        $this->children = new ArrayCollection();
        $this->parents = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name ? $this->name : 'category';
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
     * @return Category
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
     * Add children
     *
     * @param \Spolischook\RealEstateBundle\Entity\Category $children
     * @return Category
     */
    public function addChild(\Spolischook\RealEstateBundle\Entity\Category $children)
    {
        $this->children[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param \Spolischook\RealEstateBundle\Entity\Category $children
     */
    public function removeChild(\Spolischook\RealEstateBundle\Entity\Category $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set parent
     *
     * @param \Spolischook\RealEstateBundle\Entity\Category $parent
     * @return Category
     */
    public function setParent(\Spolischook\RealEstateBundle\Entity\Category $parent = null)
    {
        $this->parent = $parent;
        $parent == null ?:$parent->addChild($this);

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Spolischook\RealEstateBundle\Entity\Category 
     */
    public function getParent()
    {
        return $this->parent;
    }
}
