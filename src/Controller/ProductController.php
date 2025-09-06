<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Helpers\UploadHelper;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProductController extends AbstractController
{
    #[Route('/admin/product', name: 'app_product')]
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();
        return $this->render('admin/product/index.html.twig', [
            'controller_name' => 'ProductController',
            'products' => $products
        ]);
    }

    // Add New Product
    #[Route('/admin/product/add', name:'app_product_add')]
    public function addProduct(Request $request, EntityManagerInterface $entityManager, UploadHelper $uploadHelper)
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $product->setCreatedAt(new \DateTimeImmutable());

            $uploadedFile = $form['image'] ->getData();
            if($uploadedFile){
                $newFilename = $uploadHelper->uploadProductImage($uploadedFile);
                $product -> setImage($newFilename);
            }

            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('app_product');
        }

        return $this->render('admin/product/address/_newProduct.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
