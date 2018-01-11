<?php

namespace App\Controller;

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
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/")
     */
    public function index()
    {
        return $this->render('site/index.html.twig');
    }
}