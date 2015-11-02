<?php

namespace Aw\EventBundle\Entity;

use Aw\EventBundle\Entity\AppEntity;
use Doctrine\ORM\Mapping as ORM;

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
     * @var \User
     *
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="mst_role_id", type="integer", nullable=false)
     */
    private $mstRoleId;



    public function __toString()
    {
        return "$this->roleId";
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
     * Set userId
     *
     * @param integer $userId
     * @return UserRole
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set user
     *
     * @param \Aw\EventBundle\Entity\User $user
     * @return UserRole
     */
    public function setUser(\Aw\EventBundle\Entity\User $user = NULL)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Aw\EventBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set mstRoleId
     *
     * @param integer $mstRoleId
     *
     * @return UserRole
     */
    public function setMstRoleId($mstRoleId)
    {
        $this->mstRoleId = $mstRoleId;

        return $this;
    }

    /**
     * Get mstRoleId
     *
     * @return integer
     */
    public function getMstRoleId()
    {
        return $this->mstRoleId;
    }
}
