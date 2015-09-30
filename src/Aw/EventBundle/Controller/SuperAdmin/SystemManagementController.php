<?php

namespace Aw\EventBundle\Controller\SuperAdmin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Aw\EventBundle\Controller\AppController;

/**
 * システム管理者
 *
 * @Route("/super_admin")
 */
class SystemManagementController extends AppController
{
    /**
     * マイページ
     *
     * @Route("/", name="super_admin_my_page")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
