<?php

namespace Aw\EventBundle\EventListener;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authentication\DefaultAuthenticationFailureHandler;

class AuthenticationFailure extends DefaultAuthenticationFailureHandler
{
    private $router;
    private $session;

    public function __construct(UrlGeneratorInterface $router, Session $session)
    {
        $this->router = $router;
        $this->session = $session;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $exceptionType = get_class($exception);

        if (strstr($exceptionType, 'BadCredentialsException'))
            $this->session->getFlashBag()->set('error', "ユーザIDまたはパスワードが一致しません");

        $response = new RedirectResponse($this->router->generate('login'));

        return $response;
    }
}
