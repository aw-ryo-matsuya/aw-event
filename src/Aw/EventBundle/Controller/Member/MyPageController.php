<?php

namespace Aw\EventBundle\Controller\Member;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Aw\EventBundle\Controller\AppController;

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
