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
        return $this->render('home.html.twg');
    }

    #[Route('/', '', methods: ['GET'])]
    public function compte(): Response
    {
        return $this->render('compte.html.twig');
    }
    #[Route('/', '', methods: ['GET'])]
    public function administation(): Response
    {
        return $this->render('administration.html.twig');
    }
    #[Route('/', '', methods: ['GET'])]
    public function collection(): Response
    {
        return $this->render('catlogue.html.twig');
    }

}