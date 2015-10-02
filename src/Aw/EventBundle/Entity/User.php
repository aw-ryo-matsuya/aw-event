<?php

namespace Aw\EventBundle\Entity;

use Aw\EventBundle\Entity\AppEntity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @var mixed
     *
     * @ORM\OneToOne(targetEntity="UserRole", inversedBy="user", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="id", referencedColumnName="user_id", nullable=false)
     */
    private $userRole;

    /**
     * @var arrayCollection
     *
     * @ORM\ManyToMany(targetEntity="MstRole")
     * @ORM\JoinTable(name="user_role",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="mst_role_id", referencedColumnName="id")}
     * )
     */
    protected $userRoles;

    public function __toString()
    {
        return "$this->username";
    }

    public function __construct()
    {
        $this->userRoles = new ArrayCollection();
    }



    public function getId()
    {
        return $this->id;
    }

    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setUserRole($userRole)
    {
        if ($this->userRole !== $userRole) {
            $this->userRole = $userRole;
            $userRole->setUser($this);
        }

        return $this;
    }

    public function getUserRole()
    {
        return $this->userRole;
    }

    public function getUserRoles()
    {
        return $this->userRoles;
    }

    public function getRoles()
    {
        return $this->getUserRoles()->toArray();
    }

    public function getSalt()
    {
        return '';
    }

    public function eraseCredentials()
    {
    }

    public function equals(AdvancedUserInterface $user)
    {
        return $this->getUsername() == $user->getUsername();
    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
        ) = unserialize($serialized);
    }

    public function isEnabled()
    {
        return true;
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }
}
