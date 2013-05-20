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

    /** @ORM\OneToMany(targetEntity="TypeEstate", mappedBy="category") */
    private $types;

    /** @ORM\ManyToMany(targetEntity="Category", mappedBy="parents") */
    private $children;

    /**
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="children")
     * @ORM\JoinTable(name="category_category",
     *      joinColumns={@ORM\JoinColumn(name="child_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="parent_id", referencedColumnName="id")}
     *      )
     */
    private $parents;

    public function __construct() {
        $this->types = new ArrayCollection();
        $this->children = new ArrayCollection();
        $this->parents = new ArrayCollection();
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
     * Add types
     *
     * @param \Spolischook\RealEstateBundle\Entity\TypeEstate $types
     * @return Category
     */
    public function addType(\Spolischook\RealEstateBundle\Entity\TypeEstate $types)
    {
        $this->types[] = $types;

        return $this;
    }

    /**
     * Remove types
     *
     * @param \Spolischook\RealEstateBundle\Entity\TypeEstate $types
     */
    public function removeType(\Spolischook\RealEstateBundle\Entity\TypeEstate $types)
    {
        $this->types->removeElement($types);
    }

    /**
     * Get types
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * Add children
     *
     * @param Category $child
     * @return Category
     */
    public function addChild(Category $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove children
     *
     * @param Category $children
     */
    public function removeChild(Category $children)
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
     * Add parents
     *
     * @param Category $parent
     * @return Category
     */
    public function addParent(Category $parent)
    {
        $this->parents[] = $parent;
        $parent->addChild($this);

        return $this;
    }

    /**
     * Remove parents
     *
     * @param Category $parent
     */
    public function removeParent(Category $parent)
    {
        $this->parents->removeElement($parent);
    }

    /**
     * Get parents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getParents()
    {
        return $this->parents;
    }

    public function __toString()
    {
        return $this->name ? $this->name : 'category';
    }
}
