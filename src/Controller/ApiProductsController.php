<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiProductsController extends AbstractController
{
    private $productRepository;


    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @Route("/api/products", name="api_products_index", methods={"GET"})
     * @return Response
     */
    public function index(): Response
    {
        $products = $this->productRepository->findAll();

        return $this->json($products, 200, []);

    }
}
