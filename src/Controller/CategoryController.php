<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    #[Route('/admin/category', name: 'app_category')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findAll();
        return $this->render('admin/category/index.html.twig', [
            'categories' => $category,
        ]);
    }

    // Add new category
    #[Route('/admin/category/add', name: 'app_category_add')]
    public function addCategory(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $category = new Category();

        $form = $this -> createForm(CategoryType::class, $category);
        $form -> handleRequest($request);

        if($form -> isSubmitted() && $form->isValid()){
            $entityManagerInterface -> persist($category);
            $entityManagerInterface ->flush();

            return $this->redirectToRoute('app_category');
        }

        return $this->render('admin/category/address/_add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // View Detail Category
    #[Route('/admin/category/view', name: 'app_category_view')]
    public function viewCategory(CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findAll();
        return $this->render('admin/category/address/_view.html.twig', [
            'categories' => $category,
        ]);
    }

    // Edit Category

    // Delete Category

    // Delete Select Category
}
