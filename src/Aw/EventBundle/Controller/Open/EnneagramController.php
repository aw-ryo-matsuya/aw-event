<?php

namespace Aw\EventBundle\Controller\Open;

use Aw\EventBundle\Controller\AppController;
use Aw\EventBundle\Entity\Type1;
use Aw\EventBundle\Entity\Type2;
use Aw\EventBundle\Entity\Type3;
use Aw\EventBundle\Entity\Type4;
use Aw\EventBundle\Entity\Type5;
use Aw\EventBundle\Entity\Type6;
use Aw\EventBundle\Entity\Type7;
use Aw\EventBundle\Entity\Type8;
use Aw\EventBundle\Entity\Type9;
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
     * @Route("/enneagram", name="diagnose_enneagram_free")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->setBreadcrumbList('diagnose_enneagram_free');
        $type1 = new Type1();
        $type2 = new Type2();
        $type3 = new Type3();
        $type4 = new Type4();
        $type5 = new Type5();
        $type6 = new Type6();
        $type7 = new Type7();
        $type8 = new Type8();
        $type9 = new Type9();
        for ($i=1; $i<=9; $i++) {
            $createForm = "createType{$i}Form";
            ${'type' . $i . 'Form'} = $this->$createForm(${'type' . $i});
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
