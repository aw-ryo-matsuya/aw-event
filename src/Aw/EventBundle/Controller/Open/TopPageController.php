<?php

namespace Aw\EventBundle\Controller\Open;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
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
        return array();
    }

    /**
     * ログイン
     *
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        return $this->render('AwEventBundle::login.html.twig', array(
           'lastUsername' => $session->get(SecurityContext::LAST_USERNAME)
        ));
    }
}
