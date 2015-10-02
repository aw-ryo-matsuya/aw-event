<?php

namespace Aw\EventBundle\Controller\Member;

use Aw\EventBundle\Controller\AppController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * 一般ユーザ
 *
 * @Route("/member")
 */
class MyPageController extends AppController
{
    /**
     * マイページ
     *
     * @Route("/", name="member_my_page")
     * @Method("GET")
     * @Template()
     */
    public function myPageAction()
    {
        return array();
    }
}
