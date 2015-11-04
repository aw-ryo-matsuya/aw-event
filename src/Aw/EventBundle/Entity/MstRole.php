<?php

namespace Aw\EventBundle\Entity;

use Aw\EventBundle\Entity\AppEntity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * MstRole
 *
 * @ORM\Table(name="mst_role")
 * @ORM\Entity(repositoryClass="Aw\EventBundle\Entity\Repository\MstRoleRepository")
 */
class MstRole extends AppEntity implements RoleInterface
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
     * @ORM\Column(name="role_name", type="string", length=20, nullable=false)
     */
    private $roleName;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="groups")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }



    public function __toString()
    {
        return $this->getRole();
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
     * Set roleName
     *
     * @param string $roleName
     * @return MstRole
     */
    public function setRoleName($roleName)
    {
        $this->roleName = $roleName;

        return $this;
    }

    /**
     * Get roleName
     *
     * @return string
     */
    public function getRoleName()
    {
        return $this->roleName;
    }

    /**
     * Get Role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->getRoleName();
    }
}
