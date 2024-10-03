<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\RateRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request; // Utilisation correcte de la classe Request

class HomeController extends AbstractController
{
    #[Route('/', name: 'home.index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('home.html.twig');
    }


    #[Route('/administration', name: 'home.administration', methods: ['GET'])]
    public function administration(): Response
    {
        return $this->render('administration.html.twig');
    }

    #[Route('/catalogue', name: 'home.catalogue', methods: ['GET'])]
    public function catalogue(ArticleRepository $Repository, PaginatorInterface $paginator, Request $request): Response
    {
        $articles = $paginator->paginate(
            $Repository->findAll(),
            $request->query->getInt('page', 1),
            8
        );

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
    public function avis(RateRepository $rateRepository): Response
    {
        $rates = $rateRepository->findAll();
        return $this->render('avis.html.twig', [
            'rates' => $rates
        ]);
    }
}