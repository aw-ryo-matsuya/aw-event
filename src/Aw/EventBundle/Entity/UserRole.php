<?php

namespace Aw\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Aw\EventBundle\Entity\AppEntity;

/**
 * UserRole
 *
 * @ORM\Table(name="user_role")
 * @ORM\Entity(repositoryClass="Aw\EventBundle\Entity\Repository\UserRoleRepository")
 */
class UserRole extends AppEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var mixed
     *
     * @ORM\OneToOne(targetEntity="User", mappedBy="userrole")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="mst_role_id", type="integer", nullable=false)
     */
    private $mstRoleId;



    public function getId()
    {
        return $this->id;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setMstRoleId($mstRoleId)
    {
        $this->mstRoleId = $mstRoleId;

        return $this;
    }

    public function getMstRoleId()
    {
        return $this->mstRoleId;
    }
}
