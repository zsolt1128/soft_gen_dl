<?php

namespace App\ZsVirSoft\SoftGenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Field
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="App\ZsVirSoft\SoftGenBundle\Entity\FieldRepository")
 */
class Field
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
	 * @ORM\ManyToOne(targetEntity="Gentable", inversedBy="fields")
	 * @ORM\JoinColumn(name="gentable_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
	 */
    protected $gentable;

	/**
	 * @ORM\ManyToOne(targetEntity="Gentable", inversedBy="combofields")
	 * @ORM\JoinColumn(name="combotable_id", referencedColumnName="id", onDelete="CASCADE")
	 */
    protected $combotable;

	/**
	 * @ORM\ManyToOne(targetEntity="Type", inversedBy="fields")
	 * @ORM\JoinColumn(name="type_id", referencedColumnName="id", nullable=false)
	 */
	protected $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="prec", type="integer", nullable=true)
     */
    private $prec;
	
	// /**
	// * @ORM\OneToMany(targetEntity="Record", mappedBy="field")
	// */
	// protected $records;
	
    /**
     * @var boolean
     *
     * @ORM\Column(name="shows", type="boolean", nullable=true)
     */
    private $shows;    

    /**
     * @var boolean
     *
     * @ORM\Column(name="allowempty", type="boolean", nullable=true)
     */
    private $allowempty;    
	
    /**
     * Constructor
     */
    // public function __construct()
    // {
        // $this->records = new \Doctrine\Common\Collections\ArrayCollection();
    // }
// 
    

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
     * @return Field
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
     * @return Field
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
     * Set prec
     *
     * @param integer $prec
     *
     * @return Field
     */
    public function setPrec($prec)
    {
        $this->prec = $prec;

        return $this;
    }

    /**
     * Get prec
     *
     * @return integer
     */
    public function getPrec()
    {
        return $this->prec;
    }

    /**
     * Set shows
     *
     * @param boolean $shows
     *
     * @return Field
     */
    public function setShows($shows)
    {
        $this->shows = $shows;

        return $this;
    }

    /**
     * Get shows
     *
     * @return boolean
     */
    public function getShows()
    {
        return $this->shows;
    }

    /**
     * Set allowempty
     *
     * @param boolean $allowempty
     *
     * @return Field
     */
    public function setAllowempty($allowempty)
    {
        $this->allowempty = $allowempty;

        return $this;
    }

    /**
     * Get allowempty
     *
     * @return boolean
     */
    public function getAllowempty()
    {
        return $this->allowempty;
    }

    /**
     * Set gentable
     *
     * @param \App\ZsVirSoft\SoftGenBundle\Entity\Gentable $gentable
     *
     * @return Field
     */
    public function setGentable(\App\ZsVirSoft\SoftGenBundle\Entity\Gentable $gentable)
    {
        $this->gentable = $gentable;

        return $this;
    }

    /**
     * Get gentable
     *
     * @return \App\ZsVirSoft\SoftGenBundle\Entity\Gentable
     */
    public function getGentable()
    {
        return $this->gentable;
    }

    /**
     * Set combotable
     *
     * @param \App\ZsVirSoft\SoftGenBundle\Entity\Gentable $combotable
     *
     * @return Field
     */
    public function setCombotable(\App\ZsVirSoft\SoftGenBundle\Entity\Gentable $combotable = null)
    {
        $this->combotable = $combotable;

        return $this;
    }

    /**
     * Get combotable
     *
     * @return \App\ZsVirSoft\SoftGenBundle\Entity\Gentable
     */
    public function getCombotable()
    {
        return $this->combotable;
    }

    /**
     * Set type
     *
     * @param \App\ZsVirSoft\SoftGenBundle\Entity\Type $type
     *
     * @return Field
     */
    public function setType(\App\ZsVirSoft\SoftGenBundle\Entity\Type $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \App\ZsVirSoft\SoftGenBundle\Entity\Type
     */
    public function getType()
    {
        return $this->type;
    }

    // /**
     // * Add record
     // *
     // * @param \ZsVirSoft\SoftGenBundle\Entity\Record $record
     // *
     // * @return Field
     // */
    // public function addRecord(\ZsVirSoft\SoftGenBundle\Entity\Record $record)
    // {
        // $this->record[] = $record;
// 
        // return $this;
    // }
// 
    // /**
     // * Remove record
     // *
     // * @param \ZsVirSoft\SoftGenBundle\Entity\Record $record
     // */
    // public function removeRecord(\ZsVirSoft\SoftGenBundle\Entity\Record $record)
    // {
        // $this->record->removeElement($record);
    // }
// 
    // /**
     // * Get records
     // *
     // * @return \Doctrine\Common\Collections\Collection
     // */
    // public function getRecords()
    // {
        // return $this->records;
    // }
}
