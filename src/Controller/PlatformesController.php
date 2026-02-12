<?php

namespace App\Controller;

use App\Entity\Platforme;
use App\Repository\FilmRepository;
use App\Repository\PlatformeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PlatformesController extends AbstractController
{
    #[Route('/platformes', name: 'app_platformes')]
    public function index(PlatformeRepository $platRepo): Response
    {
        $platforms = $platRepo->findAll();

        return $this->render('platformes/index.html.twig', [
            'platforms' => $platforms,
        ]);
    }

    #[Route('/platformes/{id}', name: 'show_platforme')]
    public function show(Platforme $platform, FilmRepository $filmRepo): Response
    {

        $films = $filmRepo->findByPlatform($platform->getId());
        return $this->render('platformes/show.html.twig', [
            'platform' => $platform,
            'films' => $films
        ]);
    }
}
