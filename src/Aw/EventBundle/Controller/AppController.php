<?php

namespace Aw\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
}
