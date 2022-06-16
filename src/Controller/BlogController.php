<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'app_blog')]
    public function index(ArticlesRepository $articlesRepository): Response
    {
        $articles = $articlesRepository->findAll();
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles' => $articles
        ]);
    }

    #[Route('/blog/{id<^[0-9]+$>}', name: 'show')]
    public function show(int $id, ArticlesRepository $articlesRepository):Response
    {
        $article = $articlesRepository->findOneBy(['id' => $id]);
        // same as $program = $programRepository->find($id);

        if (!$article) {
            throw $this->createNotFoundException(
                'No article with id : '.$id.' found in articles table.'
            );
        }
        return $this->render('blog/show.html.twig', [
            'article' => $article,
        ]);
    }
    }