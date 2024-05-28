<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use function Symfony\Component\String\u;

class DogController extends AbstractController
{
    // #[Route('/dog', name: 'app_dog')]
    // public function index(): JsonResponse
    // {
    // return $this->json([
    // 'message' => 'Welcome to your new controller!',
    // 'path' => 'src/Controller/DogController.php',
    // ]);
    // }
    //
    #[Route('/', 'app_dog')]
    public function homepage(): Response
    {
        return new Response('hello world');
    }

    #[Route('/dog_breed/{slug}', 'breed_dog')]
    public function dogbreed(string $slug = null): Response
    {
        if($slug) {
            $title = 'Breed:'.u(str_replace('-', ' ', $slug))->title(true);
        }else {
            $title = 'alle breeds selected';
        }

        return new Response($title);
    }

}
