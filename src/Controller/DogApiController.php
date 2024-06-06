<?php

namespace App\Controller;


use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DogApiController extends AbstractController
{
    #[Route('/api/dogs/{id<\d+>}', name: 'my_dog', methods: ['GET'])]
public function getDog(int $id, LoggerInterface $log ):Response
{
$dog =[
    'id' => $id,
     'breed' => 'labrador',
    'size' => 'medium',
    'pelt' => 'short',
];

$log->info(' Returnere API response for hunde racer {dog}', [
    'dog' => $id
]);

return $this->json($dog);
}
}