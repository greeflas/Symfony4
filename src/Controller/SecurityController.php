<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Security controller.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class SecurityController extends Controller
{
    /**
     * Renders login form.
     *
     * @param AuthenticationUtils $authUtils
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authUtils)
    {
        if ($this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('home');
        }

        $error = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }
}