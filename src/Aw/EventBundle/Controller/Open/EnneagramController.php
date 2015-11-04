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
            ${'type' . $i . 'Form'} = $this->createTypeForm($i, ${'type' . $i});
        }

        return array(
            'type1Form' => $type1Form->createView(),
            'type2Form' => $type2Form->createView(),
            'type3Form' => $type3Form->createView(),
            'type4Form' => $type4Form->createView(),
            'type5Form' => $type5Form->createView(),
            'type6Form' => $type6Form->createView(),
            'type7Form' => $type7Form->createView(),
            'type8Form' => $type8Form->createView(),
            'type9Form' => $type9Form->createView()
        );
    }
}
