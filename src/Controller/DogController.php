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
            ['name' => 'dalmatian' , 'image' => '/images/dalma.webp' , 'size' => 'medium-size' ],
            ['name' => 'shepherd dog' , 'image' => '/images/shepherd.jpeg' , 'size' => 'medium-size'],
            ['name' => 'poodle' , 'image' => '/images/poodle.jpeg' , 'size' => 'medium-size'],
            ['name' => 'boxer', 'image' => '/images/Boxerdog.webp' , 'size' => 'medium-size'],
            ['name' => 'old english shepherd' , 'image' => '/images/old-english-sheepdog.webp' , 'size' => 'large-size'],
            ['name' => 'newfoundland' , 'image' => '/images/newfoundland.webp', 'size' => 'large-size'],
            ['name' => 'golden retriever' , 'image' => '/images/golden.jpeg' , 'size' => 'medium-size'],
        ];
        return $this->render('dogs/homepage.html.twig', ['title' => 'Chose a dog',  'dogbreeds' => $dogbreeds ]);

    }

    #[Route('/dog_breed/{slug}', 'breed_dog')]
    public function dogbreed(string $slug = null): Response
    {



        $breeds = $slug ? $title = 'Breed:'.u(str_replace('-', ' ', $slug))->title(true): $title = 'alle breeds selected';
        return $this->render('dogs/browse.html.twig', ['title' => 'browse for dogs', 'breeds' => $breeds]);

    }

}
