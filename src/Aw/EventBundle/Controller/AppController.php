<?php

namespace Aw\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Yaml\Parser;

abstract class AppController extends Controller
{
    /**
     * createTypeForm
     */
    protected function createTypeForm($iterator, $entity)
    {
        $form = $this->createForm(new \Aw\EventBundle\Form\TypeFormType($iterator), $entity, array(
            'method' => 'POST'
        ));

        return $form;
    }

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
}
