<?php

namespace Aw\EventBundle\Entity;

use Aw\EventBundle\Util;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * AppEntity
 *
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 * @Gedmo\SoftDeleteable(fieldName="deletedAt")
 */
abstract class AppEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", nullable=true)
     */
    protected $createdBy = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="updated_by", type="integer", nullable=true)
     */
    protected $updatedBy = null;

    /**
     * @var datetime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    protected $createdAt = null;

     /**
     * @var datetime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected $updatedAt = null;

    /**
     * @var dateTime
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    protected $deletedAt = null;



    /**
     * Set createdBy
     *
     * @param integer $createdBy
     * @return AtstampBase
     */
    public function setCreatedBy($createdBy)
    {
        return $this;
    }

    /**
     * Get createdBy
     *
     * @return
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set updatedBy
     *
     * @param integer $updatedBy
     * @return AtstampBase
     */
    public function setUpdatedBy($updatedBy)
    {
        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Set createdAt
     *
     * @param mixed $createdAt
     * @return AtstampBase
     */
    public function setCreatedAt($createdAt)
    {
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param mixed $updatedAt
     * @return AtstampBase
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this;
    }

    /**
     * Get updateAt
     *
     * @return
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return AtstampBase
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $currentUser = Util::getCurrentUser();

        if ($currentUser) {
            $this->createdBy = $currentUser->getId();
        } else {
            $this->createdBy = 999999999;
        }

        $this->createdAt = new \Datetime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $currentUser = Util::getCurrentUser();

        if ($currentUser) {
            $this->updatedBy = $currentUser->getId();
        } else {
            $this->updatedBy = $this->updatedBy = 999999999;
        }

        $this->updatedAt = new \Datetime();
    }
}
