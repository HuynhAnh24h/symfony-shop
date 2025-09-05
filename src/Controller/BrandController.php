<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BrandController extends AbstractController
{
    #[Route('/admin/brand', name: 'app_brand')]
    public function index(): Response
    {
        return $this->render('admin/brand/index.html.twig', [
            'controller_name' => 'BrandController',
        ]);
    }
}
