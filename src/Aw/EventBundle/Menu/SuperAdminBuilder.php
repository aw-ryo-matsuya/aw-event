<?php

namespace Aw\EventBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * システム管理者メニュー
 */
class SuperAdminBuilder extends ContainerAware
{
    /**
     * ユーザ管理
     */
    public function userManagement(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'dropdown-menu');
        $menu->addChild('ユーザ一覧', array('route' => 'user_index'));

        return $menu;
    }
}
