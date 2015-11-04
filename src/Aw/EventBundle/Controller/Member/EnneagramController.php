<?php

namespace Aw\EventBundle\Controller\Member;

use Aw\EventBundle\Controller\AppController;
use Aw\EventBundle\Util;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * エニアグラム
 *
 * @Route("/member")
 */
class EnneagramController extends AppController
{
    /**
     * エニアグラム診断(会員)
     *
     * @Route("/diagnose_enneagram", name="diagnose_enneagram_option")
     * @Method("GET")
     * @Template()
     */
    public function diagnoseAction()
    {
        $this->setBreadcrumbList('diagnose_enneagram_option');
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

    /**
     * エニアグラム診断結果登録
     *
     * @Route("/create_enneagram", name="create_enneagram")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $userId = Util::getCurrentUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $em->getConnection()->beginTransaction();
        try {
            for ($i=1; $i<=9; $i++) {
                ${'name' . $i} = '\Aw\EventBundle\Entity\Type' . $i;
                ${'type' . $i} = new ${'name' . $i};
                ${'type' . $i . 'Form'} = $this->createTypeForm($i, ${'type' . $i});
                ${'type' . $i . 'Form'}->handleRequest($request);
                if (${'type' . $i . 'Form'}->isValid()) {
                    ${'type' . $i}->setUserId($userId);
                    $em->persist(${'type' . $i});
                    $em->flush();
                }
            }
            $em->getConnection()->commit();
            $request->getSession()->getFlashBag()->set('success', '診断結果を保存しました');
        } catch (Exception $e) {
            $em->getConnection()->rollback();
            $em->close();
            $request->getSession()->getFlashBag()->set('error', '診断結果の保存に失敗しました');
            return $this->redirect($this->generateUrl('diagnose_enneagram_option'));
        }

        return $this->redirect($this->generateUrl('show_enneagram', array('userId' => $userId)));
    }

    /**
     * タイプの傾向
     *
     * @Route("/trend_enneagram/{type}", name="trend_enneagram")
     * @Method("GET")
     * @Template("AwEventBundle:Common:typeTrend.html.twig")
     */
    public function typeTrendAction(Request $request, $type)
    {
        $userId = Util::getCurrentUser()->getId();
        $this->setBreadcrumbList('trend_enneagram', $userId, 2);

        return array();
    }

    /**
     * エニアグラム診断結果確認
     *
     * @Route("/show_enneagram/{userId}", name="show_enneagram")
     * @Method("GET")
     * @Template()
     */
    public function showAction(Request $request, $userId)
    {
        $this->setBreadcrumbList('show_enneagram');
        $em = $this->getDoctrine()->getManager();
        for ($i=1; $i<=9; $i++) {
            ${'type' . $i} = $em->getRepository('AwEventBundle:Type' . $i)->findOneByUserId($userId);
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
