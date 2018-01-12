<?php

namespace App\Controller;

use App\Event\AdminDashboardAccessedEvent;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Site controller.
 * 
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class SiteController extends Controller
{
    /**
     * Index page of the site.
     *
     * @param LoggerInterface $logger The logger instance.
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/", name="home")
     */
    public function index(LoggerInterface $logger)
    {
        $logger->info('User viewed home page.');
        return $this->render('site/index.html.twig');
    }

    /**
     * Renders admin dashboard.
     *
     * @param LoggerInterface $logger
     *
     * @return Response
     *
     * @Route("/admin/dashboard", name="admin_dashboard")
     */
    public function adminDashboard(LoggerInterface $logger)
    {
        $event = new AdminDashboardAccessedEvent($logger);
        (new EventDispatcher())->dispatch(AdminDashboardAccessedEvent::NAME, $event);

        return $this->render('site/admin-dashboard.html.twig');
    }

    /**
     * Translate a some message.
     *
     * @param string $message
     * @param TranslatorInterface $translator
     *
     * @return Response
     *
     * @Route(
     *     "/translate-to-{_locale}/{message}",
     *     name="translate",
     *     requirements={"_locale": "en|ru"}
     * )
     */
    public function translate(string $message, TranslatorInterface $translator) : Response
    {
        return new Response($translator->trans($message));
    }
}