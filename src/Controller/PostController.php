<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\CategoryRepository;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(PostRepository $postRepository, CategoryRepository $categoryRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'posts' =>  $postRepository->findAll(),
            'categories' => $categoryRepository->findall()
        ]);
    }

    #[Route('/post/{id<[0-9]+>}')]
    public function show(Post $post): Response
    {
        return $this->render('home/show.html.twig', [
            'post' => $post
        ]);
    }
}
