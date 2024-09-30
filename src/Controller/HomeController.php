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

    #[Route('/compte', 'Home.compte', methods: ['GET'])]
    public function compte(): Response
    {
        return $this->render('compte.html.twig');
    }
    #[Route('/administation', 'Home.administration', methods: ['GET'])]
    public function administation(): Response
    {
        return $this->render('administration.html.twig');
    }
    #[Route('/catlogue', 'Home.catlogue', methods: ['GET'])]
    public function catlogue(): Response
    {
        return $this->render('catlogue.html.twig');
    }

}