<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\RateRepository;
use App\Repository\ArticleRepository;
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


    #[Route('/administration', name: 'home.administration', methods: ['GET', 'POST'])]
    public function administration(Request $request): Response
    {
        $article = new Article();
        $form = $this->createForm(Article::class, $article);
        $form->handleRequest($request);
        return $this->render('administration.html.twig', ['form' => $form->createView()]);
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

    #[Route('/avis', name: 'home.avis', methods: ['GET'])]
    public function avis(RateRepository $Repository, PaginatorInterface $paginator, Request $request): Response
    {
        $rates = $paginator->paginate(
            $Repository->findAll(),
            $request->query->getInt('page', 1),
            8
        );

        return $this->render('avis.html.twig', [
            'rates' => $rates
        ]);
    }
}