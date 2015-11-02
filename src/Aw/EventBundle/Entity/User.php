<?php

namespace Aw\EventBundle\Entity;

use Aw\EventBundle\Entity\AppEntity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @UniqueEntity(fields={"username"}, message="既に登録されています")
 * @ORM\Entity(repositoryClass="Aw\EventBundle\Entity\Repository\UserRepository")
 */
class User extends AppEntity implements AdvancedUserInterface, \Serializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=40, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=40, nullable=false)
     */
    private $password;

    /**
     * @var \UserRole
     *
     * @ORM\OneToOne(targetEntity="UserRole", inversedBy="user", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="id", referencedColumnName="user_id", nullable=false)
     */
    private $userRole;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="MstRole")
     * @ORM\JoinTable(name="user_role",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="mst_role_id", referencedColumnName="id")}
     * )
     */
    private $userRoles;

    public function __construct()
    {
        $this->userRoles = new ArrayCollection();
    }



    public function __toString()
    {
        return "$this->username";
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
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set userRole
     *
     * @param \Aw\EventBundle\Entity\UserRole $userRole
     * @return User
     */
    public function setUserRole(\Aw\EventBundle\Entity\UserRole $userRole = NULL)
    {
        if ($this->userRole !== $userRole) {
            $this->userRole = $userRole;
            $userRole->setUser($this);
        }

        return $this;
    }

    /**
     * Get userRole
     *
     * @return \Aw\EventBundle\Entity\UserRole
     */
    public function getUserRole()
    {
        return $this->userRole;
    }

    /**
     * Get userRoles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserRoles()
    {
        return $this->userRoles;
    }

    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        return $this->getUserRoles()->toArray();
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return '';
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password
        ) = unserialize($serialized);
    }

    /**
     * @return boolean
     */
    public function equals(AdvancedUserInterface $user)
    {
        return $this->getUsername() == $user->getUsername();
    }

    public function eraseCredentials()
    {
    }

    public function isEnabled()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }
}
