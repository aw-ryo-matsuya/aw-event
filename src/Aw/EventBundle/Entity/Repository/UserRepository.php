<?php

namespace Aw\EventBundle\Entity\Repository;

use Aw\EventBundle\Entity\Repository\AppEntityRepository;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends AppEntityRepository implements UserProviderInterface
{
    public function loadUserByUsername($id)
    {
        return $this->find($id);
    }

    public function refreshUser(UserInterface $user)
    {
        return $this->loadUserByUsername($user->getId());
    }

    public function supportsClass($class)
    {
        return true;
    }
}
