<?php

namespace App\Controller;

use App\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Product controller.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class ProductController extends Controller
{
    /**
     * @Route("/product", name="product")
     *
     * Create product.
     *
     * @return Response
     */
    public function index(): Response
    {
        $product = new Product();
        $product->setName('Monitor');
        $product->setPrice(500.50);
        $product->setDescription('Good monitor for programmers.');

        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();

        return new Response('Saved new product with ID ' . $product->getId());
    }

    /**
     * @Route("/product/{id}", name="product_show")
     *
     * Show product details.
     *
     * @param Product $product
     *
     * @return Response
     */
    public function show(Product $product): Response
    {
//        $product = $this->getDoctrine()
//            ->getRepository(Product::class)
//            ->find($id);
//
//        if (null === $product) {
//            throw $this->createNotFoundException(sprintf('No product found for ID %d', $id));
//        }

        return new Response(
            sprintf('Check out this great product: %s ($%d)', $product->getName(), $product->getPrice())
        );
    }

    /**
     * @Route("/product/edit/{id}")
     *
     * Edit product info.
     *
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function update(int $id) : RedirectResponse
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository(Product::class)->find($id);

        if (null === $product) {
            throw $this->createNotFoundException(sprintf('No product found for ID %d', $id));
        }

        $product->setPrice(400);
        $em->flush();

        return $this->redirectToRoute('product_show', [
            'id' => $product->getId(),
        ]);
    }

    /**
     * @Route("/product/remove/{id}", name="product_remove")
     *
     * Remove product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function delete($id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository(Product::class)->find($id);

        if (null === $product) {
            throw $this->createNotFoundException(sprintf('No product found for ID %d', $id));
        }

        $em->remove($product);
        $em->flush();

        return new Response(sprintf('Product with ID %s was successfully removed!', $id));
    }
}
