<?php

namespace Aw\EventBundle\EventListener;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\DefaultAuthenticationSuccessHandler;

class AuthenticationSuccess extends DefaultAuthenticationSuccessHandler
{
    private $router;
    private $session;
    private $security;

    public function __construct(UrlGeneratorInterface $router, Session $session, SecurityContext $security)
    {
        $this->router = $router;
        $this->session = $session;
        $this->security = $security;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $user = $token->getUser();

        if ($this->security->isGranted('ROLE_SUPER_ADMIN')) {
            $response = new RedirectResponse($this->router->generate('super_admin_my_page'));
        } elseif ($this->security->isGranted('ROLE_MEMBER')) {
            $response = new RedirectResponse($this->router->generate('member_my_page'));
        }

        return $response;
    }
}