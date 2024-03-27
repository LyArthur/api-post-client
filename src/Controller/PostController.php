<?php

namespace App\Controller;

use App\Services\ApiPosts;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpOptions;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PostController extends AbstractController
{


    #[Route('/posts', name: 'app_post', methods: ['GET'])]
    public function index(ApiPosts $apiPosts): Response
    {

        dd($posts = $apiPosts->getPosts());


        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
            'posts' => $posts
        ]);
    }
}
