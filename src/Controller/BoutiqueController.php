<?php

namespace App\Controller;

use App\Service\BoutiqueService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route(
    path: '/',
)]
final class BoutiqueController extends AbstractController
{
    #[Route(
        path: '{_locale}/boutique',
        name: 'app_boutique_index'
    )]
    public function index(BoutiqueService $boutiqueService): Response
    {
        return $this->render('boutique/index.html.twig', [
            'categories' => $boutiqueService->findAllCategories()
        ]);
    }

    #[Route(
        path: '{_locale}/rayon/{idCategorie}',
        name: 'app_boutique_rayon',
        requirements: ['idCategorie' => '\d+']
    )]
    public function rayon(int $idCategorie, BoutiqueService $boutiqueService): Response
    {
        $categorie = $boutiqueService->findCategorieById($idCategorie);

        if (!$categorie) {
            throw $this->createNotFoundException("Le rayon n° $idCategorie n'existe pas");
        }

        return $this->render('boutique/rayon.html.twig', [
            'categorie' => $categorie,
            'produits' => $boutiqueService->findProduitsByCategorie($idCategorie)
        ]);
    }
}
