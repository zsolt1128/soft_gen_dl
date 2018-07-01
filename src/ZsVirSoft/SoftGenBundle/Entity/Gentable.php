<?php

namespace App\ZsVirSoft\SoftGenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Gentable
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="App\ZsVirSoft\SoftGenBundle\Entity\GentableRepository")
 */
class Gentable
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
     * @ORM\Column(name="name", type="string", length=191)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="namepub", type="string", length=191, nullable=true)
     */
    private $namepub;

	/**
	* @ORM\OneToMany(targetEntity="Field", mappedBy="gentable")
	*/
	protected $fields;

	/**
	* @ORM\OneToMany(targetEntity="Field", mappedBy="gentable")
	*/
	protected $combofields;
	
	/** 
	 * @ORM\ManyToOne(targetEntity="Users", inversedBy="gentables")
	 * @ORM\JoinColumn(name="users_id", referencedColumnName="id", nullable=false)
	 */
    protected $users;
	
    /**
     * @var boolean
     *
     * @ORM\Column(name="mysoft", type="boolean", nullable=true, options={"default" : false})
     */
    private $mysoft;    
	
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fields = new \Doctrine\Common\Collections\ArrayCollection();
        $this->combofields = new \Doctrine\Common\Collections\ArrayCollection();
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
     *
     * @return Gentable
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
     * Set namepub
     *
     * @param string $namepub
     *
     * @return Gentable
     */
    public function setNamepub($namepub)
    {
        $this->namepub = $namepub;

        return $this;
    }

    /**
     * Get namepub
     *
     * @return string
     */
    public function getNamepub()
    {
        return $this->namepub;
    }

    /**
     * Set mysoft
     *
     * @param boolean $mysoft
     *
     * @return Gentable
     */
    public function setMysoft($mysoft)
    {
        $this->mysoft = $mysoft;

        return $this;
    }

    /**
     * Get mysoft
     *
     * @return boolean
     */
    public function getMysoft()
    {
        return $this->mysoft;
    }

    /**
     * Add field
     *
     * @param \App\ZsVirSoft\SoftGenBundle\Entity\Field $field
     *
     * @return Gentable
     */
    public function addField(\App\ZsVirSoft\SoftGenBundle\Entity\Field $field)
    {
        $this->fields[] = $field;

        return $this;
    }

    /**
     * Remove field
     *
     * @param \App\ZsVirSoft\SoftGenBundle\Entity\Field $field
     */
    public function removeField(\App\ZsVirSoft\SoftGenBundle\Entity\Field $field)
    {
        $this->fields->removeElement($field);
    }

    /**
     * Get fields
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Add combofield
     *
     * @param \App\ZsVirSoft\SoftGenBundle\Entity\Field $combofield
     *
     * @return Gentable
     */
    public function addCombofield(\App\ZsVirSoft\SoftGenBundle\Entity\Field $combofield)
    {
        $this->combofields[] = $combofield;

        return $this;
    }

    /**
     * Remove combofield
     *
     * @param \App\ZsVirSoft\SoftGenBundle\Entity\Field $combofield
     */
    public function removeCombofield(\App\ZsVirSoft\SoftGenBundle\Entity\Field $combofield)
    {
        $this->combofields->removeElement($combofield);
    }

    /**
     * Get combofields
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCombofields()
    {
        return $this->combofields;
    }

    /**
     * Set users
     *
     * @param \App\ZsVirSoft\SoftGenBundle\Entity\Users $users
     *
     * @return Gentable
     */
    public function setUsers(\App\ZsVirSoft\SoftGenBundle\Entity\Users $users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \App\ZsVirSoft\SoftGenBundle\Entity\Users
     */
    public function getUsers()
    {
        return $this->users;
    }
}
