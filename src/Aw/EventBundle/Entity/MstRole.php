<?php

namespace Aw\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * MstRole
 *
 * @ORM\Table(name="mst_role")
 * @ORM\Entity(repositoryClass="Aw\EventBundle\Entity\Repository\MstRoleRepository")
 */
class MstRole implements RoleInterface
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
     * @var users
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="groups")
     */
    private $users;

    public function __toString()
    {
        return $this->getRoleName();
    }



    public function getId()
    {
        return $this->id;
    }

    public function setRoleName($roleName)
    {
        $this->roleName = $roleName;

        return $this;
    }

    public function getRole()
    {
        return $this->roleName;
    }
}
