<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use function Symfony\Component\String\u;

class DogController extends AbstractController
{

    #[Route('/', 'app_dog')]
    public function homepage(): Response
    {
        $dogbreeds = [
            ['name' => 'dalmatian'],
            ['name' => 'shepherd dog'],
            ['name' => 'poodle'],
            ['name' => 'boxer'],
            ['name' => 'old english shepherd'],
            ['name' => 'newfoundland'],
            ['name' => 'golden retriever'],
        ];
        return $this->render('dogs/homepage.html.twig', ['title' => 'Chose a dog',  'dogbreeds' => $dogbreeds ]);

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
