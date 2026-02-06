<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AppBoutiqueIndexController extends AbstractController
{
    #[Route('/app/boutique/index', name: 'app_boutique_index')]
    public function index(): Response
    {
        return $this->render('app_boutique_index/index.html.twig', [
            'controller_name' => 'AppBoutiqueIndexController',
        ]);
    }
}
