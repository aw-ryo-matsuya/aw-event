<?php

namespace Aw\EventBundle\Controller;

use Aw\EventBundle\Form\Type1Type;
use Aw\EventBundle\Form\Type2Type;
use Aw\EventBundle\Form\Type3Type;
use Aw\EventBundle\Form\Type4Type;
use Aw\EventBundle\Form\Type5Type;
use Aw\EventBundle\Form\Type6Type;
use Aw\EventBundle\Form\Type7Type;
use Aw\EventBundle\Form\Type8Type;
use Aw\EventBundle\Form\Type9Type;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Yaml\Parser;

abstract class AppController extends Controller
{
    /**
     * ページャー取得
     */
    protected function getPaginator($query, $pageRange = 0)
    {
        $paginator = $this->get('knp_paginator');

        if ($pageRange > 0) {
            $pagination = $paginator->paginate($query, $this->get('request')->query->get('page', 1), $pageRange);
        } else {
            $pagination = $paginator->paginate($query, $this->get('request')->query->get('page', 1));
        }

        return $pagination;
    }

    /**
     * パンくずリストパラメータ分解
     */
    protected function divideBreadcrumbParam($breadName)
    {
        $first = strpos($breadName, "%") + 1;
        $end = strrpos($breadName, "%");
        $paramName = substr($breadName, $first, $end-$first);
        $routeName = substr($breadName, 0, strpos($breadName, "/"));

        return array(
            'paramName' => $paramName,
            'routeName' => $routeName
        );
    }

    /**
     * パンくずリスト取得
     */
    protected function setBreadcrumbList($name, $paramRoute1 = NULL, $paramStage1 = NULL, $paramRoute2 = NULL, $paramStage2 = NULL)
    {
        $parser = new Parser();
        $yml = $parser->parse(file_get_contents(__DIR__.'/../Resources/translations/breadcrumbs.yml'));
        $repeatMax = count($yml['breadcrumbs'][$name])/2;
        $breadcrumbs = $this->get("white_october_breadcrumbs");

        for ($i=1; $i<=$repeatMax; $i++) {
            $linkName = $yml['breadcrumbs'][$name][$i.'_name'];
            if (is_null($yml['breadcrumbs'][$name][$i])) {
                $linkUrl = "";
            } else {
                if ($i == $paramStage1 && !is_null($paramRoute1)) {
                    $breadName = $this->divideBreadcrumbParam($yml['breadcrumbs'][$name][$i]);
                    $linkUrl = $this->get("router")->generate($breadName['routeName'], array($breadName['paramName'] => $paramRoute1));
                } elseif ($i == $paramStage2 && !is_null($paramRoute2)) {
                    $breadName = $this->divideBreadcrumbParam($yml['breadcrumbs'][$name][$i]);
                    $linkUrl = $this->get("router")->generate($breadName['routeName'], array($breadName['paramName'] => $paramRoute2));
                } else {
                    $linkUrl = $this->get("router")->generate($yml['breadcrumbs'][$name][$i]);
                }
            }
            $breadcrumbs->addItem($linkName, $linkUrl);
        }
    }

    /**
     * createType1Form
     */
    protected function createType1Form(\Aw\EventBundle\Entity\Type1 $entity)
    {
        $form = $this->createForm(new Type1Type(), $entity, array(
            'method' => 'POST'
        ));

        return $form;
    }

    /**
     * createType2Form
     */
    protected function createType2Form(\Aw\EventBundle\Entity\Type2 $entity)
    {
        $form = $this->createForm(new Type2Type(), $entity, array(
            'method' => 'POST'
        ));

        return $form;
    }

    /**
     * createType3Form
     */
    protected function createType3Form(\Aw\EventBundle\Entity\Type3 $entity)
    {
        $form = $this->createForm(new Type3Type(), $entity, array(
            'method' => 'POST'
        ));

        return $form;
    }

    /**
     * createType4Form
     */
    protected function createType4Form(\Aw\EventBundle\Entity\Type4 $entity)
    {
        $form = $this->createForm(new Type4Type(), $entity, array(
            'method' => 'POST'
        ));

        return $form;
    }

    /**
     * createType5Form
     */
    protected function createType5Form(\Aw\EventBundle\Entity\Type5 $entity)
    {
        $form = $this->createForm(new Type5Type(), $entity, array(
            'method' => 'POST'
        ));

        return $form;
    }

    /**
     * createType6Form
     */
    protected function createType6Form(\Aw\EventBundle\Entity\Type6 $entity)
    {
        $form = $this->createForm(new Type6Type(), $entity, array(
            'method' => 'POST'
        ));

        return $form;
    }

    /**
     * createType7Form
     */
    protected function createType7Form(\Aw\EventBundle\Entity\Type7 $entity)
    {
        $form = $this->createForm(new Type7Type(), $entity, array(
            'method' => 'POST'
        ));

        return $form;
    }

    /**
     * createType8Form
     */
    protected function createType8Form(\Aw\EventBundle\Entity\Type8 $entity)
    {
        $form = $this->createForm(new Type8Type(), $entity, array(
            'method' => 'POST'
        ));

        return $form;
    }

    /**
     * createType9Form
     */
    protected function createType9Form(\Aw\EventBundle\Entity\Type9 $entity)
    {
        $form = $this->createForm(new Type9Type(), $entity, array(
            'method' => 'POST'
        ));

        return $form;
    }
}
