<?php

namespace Aw\EventBundle\Controller\Open;

use Aw\EventBundle\Controller\AppController;
use Aw\EventBundle\Entity\Type1;
use Aw\EventBundle\Form\Type1Type;
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
        $type1Form = $this->createType1Form($type1);

        return array(
            'type1Form' => $type1Form->createView()
        );
    }

    /**
     * Type1Form
     */
    private function createType1Form(Type1 $entity)
    {
        $form = $this->createForm(new Type1Type(), $entity, array(
            'method' => 'POST'
        ));

        $form->add('submit', 'submit');

        return $form;
    }
}
