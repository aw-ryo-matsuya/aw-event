<?php

namespace Aw\EventBundle\Controller\SuperAdmin;

use Aw\EventBundle\Util;
use Aw\EventBundle\Controller\AppController;
use Aw\EventBundle\Entity\User;
use Aw\EventBundle\Entity\UserRole;
use Aw\EventBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * システム管理者
 *
 * @Route("/super_admin")
 */
class SystemManagementController extends AppController
{
    /**
     * マイページ
     *
     * @Route("/", name="super_admin_my_page")
     * @Method("GET")
     * @Template()
     */
    public function myPageAction()
    {
        return array();
    }

    /**
     * ユーザ一覧
     *
     * @Route("/user_index", name="user_index")
     * @Method("GET")
     * @Template()
     */
    public function userIndexAction()
    {
        $this->setBreadcrumbList('user_index');
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('AwEventBundle:User')->getSearchQuery();
        $pagination = $this->getPaginator($query);

        return array(
            'pagination' => $pagination
        );
    }

    /**
     * ユーザ登録
     *
     * @Route("/user_new", name="user_new")
     * @Method("GET")
     * @Template()
     */
    public function userNewAction()
    {
        $this->setBreadcrumbList('user_new');
        $entity = new User();
        $form = $this->createUserNewForm($entity);

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * ユーザ登録確認
     *
     * @Route("/user_new_conf", name="user_new_conf")
     * @Method("POST")
     * @Template()
     */
    public function userNewConfAction(Request $request)
    {
        $entity = new User();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createUserNewForm($entity);

        // キャンセルボタン押下時
        if ($request->request->has('cancel')) {
            $this->setBreadcrumbList('user_new');
            $data = $request->getSession()->get('conf_new_user');
            $form->submit($data);

            return $this->render('AwEventBundle:SuperAdmin\SystemManagement:userNew.html.twig', array(
                'form' => $form->createView()
            ));
        }

        $data = $request->request->get($form->getName());
        $form->submit($data);

        if ($form->isValid()) {
            $request->getSession()->set('conf_new_user', $data);
            $msg = $this->get('translator')->trans('com_message.newConf');
            $request->getSession()->getFlashBag()->set('info', $msg);
        } else {
            $this->setBreadcrumbList('user_new');
            return $this->render('AwEventBundle:SuperAdmin\SystemManagement:userNew.html.twig', array(
                'form' => $form->createView()
            ));
        }

        $this->setBreadcrumbList('user_new_conf');

        return array(
            'entity' => $entity
        );
    }

    /**
     * 登録処理
     *
     * @Route("/user_create", name="user_create")
     * @Method("POST")
     */
    public function userCreateAction(Request $request)
    {
        $user = new User();
        $userRole = new UserRole();

        if ($request->getSession()->has('conf_new_user')) {
            $em = $this->getDoctrine()->getManager();
            $data = $request->getSession()->get('conf_new_user');
            $user->setUserRole($userRole);
            $userRole->setMstRoleId(2);
            // パスワード暗号化
            $data['password']['first'] = Util::encodePassword($data['password']['first']);
            $data['password']['second'] = Util::encodePassword($data['password']['second']);
            $form = $this->createUserNewForm($user);
            $form->submit($data);

            $em->persist($user);
            $em->flush();
            $msg = $this->get('translator')->trans('com_message.createOK');
            $request->getSession()->getFlashBag()->set('info', $msg);

            return $this->redirectToRoute('user_index');
        }
    }

    /**
     * 分岐
     *
     * @Route("/forward", name="user_forward")
     * @Method("POST")
     */
    public function forwardAction(Request $request)
    {
        $response = "";
        $selId = $request->request->get('selId');
        $selKind = $request->request->get('selKind');

        switch ($selKind) {
            case 'new': // 新規ボタン押下時
                return $this->redirectToRoute('user_new');
            default:
        }

        return $response;
    }

    /**
     * ユーザ登録フォーム
     */
    private function createUserNewForm(User $entity)
    {
        $form = $this->createForm(new UserType(), $entity, array(
            'method' => 'POST'
        ));

        $form->add('submit', 'submit');

        return $form;
    }
}
