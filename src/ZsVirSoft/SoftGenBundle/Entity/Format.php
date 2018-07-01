<?php

namespace App\ZsVirSoft\SoftGenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Format
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="App\ZsVirSoft\SoftGenBundle\Entity\FormatRepository")
 */
class Format
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
	* @ORM\OneToMany(targetEntity="Users", mappedBy="format")
	*/
	protected $users;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Format
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
     * Add users
     *
     * @param \App\ZsVirSoft\SoftGenBundle\Entity\Users $users
     * @return Users
     */
    public function addUsers(\App\ZsVirSoft\SoftGenBundle\Entity\Field $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \App\ZsVirSoft\SoftGenBundle\Entity\Users $users
     */
    public function removeUsers(\App\ZsVirSoft\SoftGenBundle\Entity\Users $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add user
     *
     * @param \App\ZsVirSoft\SoftGenBundle\Entity\Users $user
     *
     * @return Format
     */
    public function addUser(\App\ZsVirSoft\SoftGenBundle\Entity\Users $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \App\ZsVirSoft\SoftGenBundle\Entity\Users $user
     */
    public function removeUser(\App\ZsVirSoft\SoftGenBundle\Entity\Users $user)
    {
        $this->users->removeElement($user);
    }
}
