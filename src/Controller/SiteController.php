<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
     * @Route("/")
     */
    public function index(LoggerInterface $logger)
    {
        $logger->info('User viewed home page.');
        return $this->render('site/index.html.twig');
    }
}