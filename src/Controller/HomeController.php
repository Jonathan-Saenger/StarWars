<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(HttpClientInterface $httpClient): Response
    {
        $personnages = $httpClient->request(
            'GET',
            'https://swapi.py4e.com/api/people/'
        );

        return $this->render('home/index.html.twig', [
            'personnages' => $personnages->toArray()['results'],
        ]);
    }
}
