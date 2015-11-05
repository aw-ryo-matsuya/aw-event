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
            $typeForm['type' . $i . 'Form'] = $this->createTypeForm($i, ${'type' . $i})->createView();
        }

        return $typeForm;
    }

    /**
     * エニアグラム診断結果登録
     *
     * @Route("/create_enneagram", name="create_enneagram")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $checked = array();
        $userId = Util::getCurrentUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $em->getConnection()->beginTransaction();
        try {
            for ($i=1; $i<=9; $i++) {
                ${'name' . $i} = '\Aw\EventBundle\Entity\Type' . $i;
                ${'type' . $i} = new ${'name' . $i};
                ${'type' . $i . 'Form'} = $this->createTypeForm($i, ${'type' . $i});
                ${'type' . $i . 'Form'}->submit($request);
                if (${'type' . $i . 'Form'}->isValid()) {
                    $counter = 0;
                    for ($j=1; $j<=20; $j++) {
                        $getter = "getQuestion{$j}";
                        if (${'type' . $i}->$getter()) {
                            $counter++;
                        }
                    }
                    $checked[$i] = $counter;
                    ${'type' . $i}->setUserId($userId);
                    $em->persist(${'type' . $i});
                    $em->flush();
                }
            }
            $em->getConnection()->commit();
        } catch (Exception $e) {
            $em->getConnection()->rollback();
            $em->close();
            $request->getSession()->getFlashBag()->set('error', '診断結果の保存に失敗しました');
            return $this->redirect($this->generateUrl('diagnose_enneagram_option'));
        }

        // タイプを決定
        $yourType = array_keys($checked, max($checked));
        if (count($yourType) == 1) {
            $user = $em->getRepository('AwEventBundle:User')->find($userId);
            $user->setEnneagramType(array_shift($yourType));
            $em->flush();
            $request->getSession()->getFlashBag()->set('success', '診断結果を保存しました');
        } else {
            $request->getSession()->getFlashBag()->set('warning', 'タイプが重複しています');
            return $this->redirect($this->generateUrl('select_type', array('choices' => $yourType)));
        }

        return $this->redirect($this->generateUrl('show_enneagram', array('userId' => $userId)));
    }

    /**
     * タイプ選択
     *
     * @Route("/select_type", name="select_type")
     * @Template()
     */
    public function selectTypeAction(Request $request)
    {
        if ($request->getMethod() === 'GET') {
            $this->setBreadcrumbList('select_type');
            $choices = array();
            foreach ($request->query->get('choices') as $list) {
                $choices[$list] = 'タイプ' . $list;
            }
            $form = $this->get('form.factory')->createNamedBuilder('select_type', 'form')
                ->add('type', 'choice', array(
                    'expanded' => true,
                    'choices'  => $choices
                ))
                ->getForm();

            return array(
                'form' => $form->createView()
            );
        } else {
            $em = $this->getDoctrine()->getManager();
            $selected = $request->request->get('select_type');
            $userId = Util::getCurrentUser()->getId();

            $user = $em->getRepository('AwEventBundle:User')->find($userId);
            $user->setEnneagramType(array_shift($selected));
            $em->flush();
            $request->getSession()->getFlashBag()->set('success', '診断結果を保存しました');

            return $this->redirect($this->generateUrl('show_enneagram', array('userId' => $userId)));
        }
    }

    /**
     * タイプの傾向
     *
     * @Route("/trend_enneagram", name="trend_enneagram_option")
     * @Method("GET")
     * @Template("AwEventBundle:Common:typeTrend.html.twig")
     */
    public function typeTrendAction()
    {
        $userId = Util::getCurrentUser()->getId();
        $this->setBreadcrumbList('trend_enneagram_option', $userId, 2);

        return array();
    }

    /**
     * エニアグラム診断結果確認
     *
     * @Route("/show_enneagram/{userId}", name="show_enneagram")
     * @Method("GET")
     * @Template()
     */
    public function showAction($userId)
    {
        $this->setBreadcrumbList('show_enneagram');
        $em = $this->getDoctrine()->getManager();
        for ($i=1; $i<=9; $i++) {
            ${'type' . $i} = $em->getRepository('AwEventBundle:Type' . $i)->findOneByUserId($userId);
            $typeForm['type' . $i . 'Form'] = $this->createTypeForm($i, ${'type' . $i})->createView();
        }

        return $typeForm;
    }
}
