<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', 'home.index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('home.html.twig');
    }

    #[Route('/compte', 'home.compte', methods: ['GET'])]
    public function compte(): Response
    {
        return $this->render('compte.html.twig');
    }
    #[Route('/administration', 'home.administration', methods: ['GET'])]
    public function administration(): Response
    {
        return $this->render('administration.html.twig');
    }
    #[Route('/catalogue', 'home.catalogue', methods: ['GET'])]
    public function catalogue(): Response
    {
        return $this->render('catalogue.html.twig');
    }
    #[Route('/item', 'home.item', methods: ["GET"])]
    public function item(): Response
    {
        return $this->render('item.html.twig');
    }
    #[Route('/avis', 'home.avis', methods: ["GET"])]
    public function avis(): Response
    {
        return $this->render('avis.html.twig');
    }
}