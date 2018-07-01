<?php

namespace App\ZsVirSoft\SoftGenBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Users
 * 
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="App\ZsVirSoft\SoftGenBundle\Entity\UsersRepository")
 */
class Users implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true, length=191)
     */
    private $username;

    /**
     * @ORM\Column(type="string", unique=true, length=191)
     */
    private $email;


    /**
     * @ORM\Column(type="string", length=191)
     */
    private $password;


    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=191)
     */
    private $code;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;    

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_login", type="datetime")
     */
    private $last_login;    

	/**
	* @ORM\OneToMany(targetEntity="Gentable", mappedBy="users")
	*/
	protected $gentables;

    /**
     * @var string
     *
     * @ORM\Column(name="roles", type="string", length=191)
     */
    private $roles;

	/**
	 * @ORM\ManyToOne(targetEntity="Format", inversedBy="users")
	 * @ORM\JoinColumn(name="format_id", referencedColumnName="id")
	 */
	protected $format;

    /**
     * @var string
     *
     * @ORM\Column(name="decimalseparator", type="string", length=191)
     */
    private $decimalseparator;

    /**
     * @var string
     *
     * @ORM\Column(name="thousandseparator", type="string", length=191)
     */
    private $thousandseparator;




    /**
     * Constructor
     */
    public function __construct()
    {
        $this->gentables = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\Column(type="string", unique=true, length=191)
     */
    private $apiKey;



    public function getUsername()
    {
        return $this->username;
    }

    public function getRoles()
    {
//        return array('ROLE_USER');
        return array($this->roles);
    }

    public function getPassword()
    {
		return $this->password;
    }
    public function getSalt()
    {
    }
    public function eraseCredentials()
    {
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
     * Set username
     *
     * @param string $username
     *
     * @return Users
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set roles
     *
     * @param string $roles
     *
     * @return Roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
        return $this;
    }
    
    
    /**
     * Set email
     *
     * @param string $email
     *
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Users
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Users
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set lastLogin
     *
     * @param \DateTime $lastLogin
     *
     * @return Users
     */
    public function setLastLogin($lastLogin)
    {
        $this->last_login = $lastLogin;

        return $this;
    }

    /**
     * Get lastLogin
     *
     * @return \DateTime
     */
    public function getLastLogin()
    {
        return $this->last_login;
    }

    /**
     * Set apiKey
     *
     * @param string $apiKey
     *
     * @return Users
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * Get apiKey
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Add gentable
     *
     * @param \App\ZsVirSoft\SoftGenBundle\Entity\Gentable $gentable
     *
     * @return Users
     */
    public function addGentable(\App\ZsVirSoft\SoftGenBundle\Entity\Gentable $gentable)
    {
        $this->gentables[] = $gentable;

        return $this;
    }

    /**
     * Remove gentable
     *
     * @param \App\ZsVirSoft\SoftGenBundle\Entity\Gentable $gentable
     */
    public function removeGentable(\App\ZsVirSoft\SoftGenBundle\Entity\Gentable $gentable)
    {
        $this->gentables->removeElement($gentable);
    }

    /**
     * Get gentables
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGentables()
    {
        return $this->gentables;
    }

    /**
     * Set decimalseparator
     *
     * @param string $decimalseparator
     *
     * @return Users
     */
    public function setDecimalseparator($decimalseparator)
    {
        $this->decimalseparator = $decimalseparator;

        return $this;
    }

    /**
     * Get decimalseparator
     *
     * @return string
     */
    public function getDecimalseparator()
    {
        return $this->decimalseparator;
    }

    /**
     * Set thousandseparator
     *
     * @param string $thousandseparator
     *
     * @return Users
     */
    public function setThousandseparator($thousandseparator)
    {
        $this->thousandseparator = $thousandseparator;

        return $this;
    }

    /**
     * Get thousandseparator
     *
     * @return string
     */
    public function getThousandseparator()
    {
        return $this->thousandseparator;
    }

    /**
     * Set format
     *
     * @param \App\ZsVirSoft\SoftGenBundle\Entity\Format $format
     *
     * @return Users
     */
    public function setFormat(\App\ZsVirSoft\SoftGenBundle\Entity\Format $format = null)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return \App\ZsVirSoft\SoftGenBundle\Entity\Format
     */
    public function getFormat()
    {
        return $this->format;
    }
}
