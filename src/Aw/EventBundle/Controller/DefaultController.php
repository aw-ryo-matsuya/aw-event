<?php

namespace Aw\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AwEventBundle:Default:index.html.twig', array('name' => 'ryo'));
    }
}
