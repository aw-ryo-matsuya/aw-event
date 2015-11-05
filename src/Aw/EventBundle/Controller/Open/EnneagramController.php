<?php

namespace Aw\EventBundle\Controller\Open;

use Aw\EventBundle\Controller\AppController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * エニアグラム
 *
 * @Route("/top")
 */
class EnneagramController extends AppController
{
    /**
     * エニアグラム診断(無料)
     *
     * @Route("/diagnose_enneagram", name="diagnose_enneagram_free")
     * @Method("GET")
     * @Template()
     */
    public function diagnoseAction()
    {
        $this->setBreadcrumbList('diagnose_enneagram_free');
        for ($i=1; $i<=9; $i++) {
            ${'name' . $i} = '\Aw\EventBundle\Entity\Type' . $i;
            ${'type' . $i} = new ${'name' . $i};
            $typeForm['type' . $i . 'Form'] = $this->createTypeForm($i, ${'type' . $i})->createView();
        }

        return $typeForm;
    }

    /**
     * タイプの傾向
     *
     * @Route("/trend_enneagram", name="trend_enneagram_free")
     * @Method("GET")
     * @Template("AwEventBundle:Common:typeTrend.html.twig")
     */
    public function typeTrendAction()
    {
        $this->setBreadcrumbList('trend_enneagram_free');

        return array();
    }
}
