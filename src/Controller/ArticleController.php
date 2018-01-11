<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Article controller.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class ArticleController extends Controller
{
    /**
     * Renders article by slug.
     *
     * @param string $slug
     * @return Response
     *
     * @Route("/article/{slug}", name="article_show", requirements={"slug"="[a-zA-Z0-9-]+"})
     */
    public function show(string $slug = 'index') : Response
    {
        return new Response(
            sprintf('Future page to show article: %s', $slug)
        );
    }
}
