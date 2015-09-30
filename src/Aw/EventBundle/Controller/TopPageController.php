<?php

namespace Aw\EventBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TopPageController extends Controller
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
