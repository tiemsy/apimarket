<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ApiProductsController extends AbstractController
{
    /**
     * @var ProductRepository
     */
    private $productRepository;


    /**
     * ApiProductsController constructor.
     * @param ProductRepository $productRepository
     */
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

    /**
     * @Route("/api/product", name="api_product_store", methods={"POST"})
     */
    public function store(Request $request,
                          SerializerInterface $serializer,
                          EntityManagerInterface $em,
                          ValidatorInterface $validator)
    {
        $getJson = $request->getContent();

        try {
            $product = $serializer->deserialize($getJson, Product::class, 'json');

            $errors = $validator->validate($product);

            if (count($errors) > 0) {
                return $this->json($errors, 400);
            }
            $em->persist($product);
            $em->flush();
            return $this->json($product, 201, []);
        } catch (NotEncodableValueException $e) {
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage()
            ], 400);
        }

    }
}
