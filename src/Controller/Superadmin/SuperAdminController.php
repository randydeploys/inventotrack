<?php

namespace App\Controller\Superadmin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/superadmin', name: 'superadmin_')]
// #[IsGranted('ROLE_SUPER_ADMIN')]
final class SuperAdminController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('superadmin/index.html.twig', [
            'controller_name' => 'SuperAdminController',
        ]);
    }
}
