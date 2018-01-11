<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

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
     * @return Response
     *
     * @Route("/admin/dashboard", name="admin_dashboard")
     */
    public function adminDashboard()
    {
        return $this->render('site/admin-dashboard.html.twig');
    }
}