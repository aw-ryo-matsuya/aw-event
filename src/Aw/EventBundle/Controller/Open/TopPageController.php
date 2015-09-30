<?php

namespace Aw\EventBundle\Controller\Open;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Aw\EventBundle\Controller\AppController;

class TopPageController extends AppController
{
    /**
     * トップページ
     *
     * @Route("/", name="top")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return array(
            'test' => '準備中'
        );
    }
}
