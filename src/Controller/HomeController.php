<?php

namespace App\Controller;

use App\Entity\Rate;
use App\Entity\User;
use App\Entity\Article;
use App\Form\AddRateType;
use App\Form\AddUserType;
use App\Form\AddArticleType;
use App\Repository\RateRepository;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request; // Utilisation correcte de la classe Request


class HomeController extends AbstractController
{
    #[Route('/', name: 'home.index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('home.html.twig');
    }


    #[Route('/administration/addArticle', name: 'home.administration_article', methods: ['GET', 'POST'])]
    // #[IsGranted('ROLE_MODÉRATEUR')]
    #[IsGranted('ROLE_ADMINISTRATEUR')]

    public function addArticle(Request $request, EntityManagerInterface $manager): Response
    {
        $article = new Article();
        $form = $this->createForm(AddArticleType::class, $article);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $article = $form->getData();
            $manager->persist($article);
            $manager->flush();
        } else {

        }
        return $this->render('administration/addArticle.html.twig', ['form' => $form->createView()]);
    }
    #[Route('/administration/addRate', name: 'home.administration_rate', methods: ['GET', 'POST'])]
    public function addRate(Request $request, EntityManagerInterface $manager): Response
    {
        $Rate = new Rate();
        $form = $this->createForm(AddRateType::class, $Rate);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $Rate = $form->getData();
            $manager->persist($Rate);
            $manager->flush();
        } else {

        }
        return $this->render('administration/addArticle.html.twig', ['form' => $form->createView()]);
    }
    #[Route('/administration/addUser', name: 'home.administration_user', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMINISTRATEUR')]

    public function addUser(Request $request, EntityManagerInterface $manager): Response
    {
        $user = new User();
        $form = $this->createForm(AddUserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $manager->persist($user);
            $manager->flush();
        } else {

        }
        return $this->render('administration/addArticle.html.twig', ['form' => $form->createView()]);
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


    #[Route('/form', name: 'home.form', methods: ['GET'])]
    public function form(): Response
    {
        return $this->render('form.html.twig');
    }

}