<?php

namespace Aw\EventBundle;

class Util
{
    /**
     * パスワード暗号化
     */
    public static function encodePassword($password)
    {
        $encodedPassword = sha1($password);

        return $encodedPassword;
    }

    /**
     * ログインユーザ情報取得
     */
    public static function getCurrentUser()
    {
        global $kernel;
        $token = $kernel->getContainer()->get('security.context')->getToken();
        $currentUser = $token ? $token->getUser() : NULL;

        return $currentUser;
    }
}
