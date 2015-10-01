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
}
