<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home.index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('home.html.twig');
    }

    #[Route('/compte', name: 'home.compte', methods: ['GET'])]
    public function compte(): Response
    {
        return $this->render('compte.html.twig');
    }

    #[Route('/administration', name: 'home.administration', methods: ['GET'])]
    public function administration(): Response
    {
        return $this->render('administration.html.twig');
    }

    #[Route('/catalogue', name: 'home.catalogue', methods: ['GET'])]
    public function catalogue(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findAll();
        return $this->render('catalogue.html.twig', [
            'articles' => $articles
        ]);
    }

    #[Route('/item', name: 'home.item', methods: ['GET'])]
    public function item(): Response
    {
        return $this->render('item.html.twig');
    }

    #[Route('/avis', name: 'home.avis', methods: ['GET'])]
    public function avis(): Response
    {
        return $this->render('avis.html.twig');
    }
}