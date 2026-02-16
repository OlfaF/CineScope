<?php

namespace App\Controller;

use App\Entity\Platforme;
use App\Repository\FilmRepository;
use App\Repository\PlatformeRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function show(Platforme $platform, FilmRepository $filmRepo, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $filmRepo->findByPlatformQuery($platform->getId());

        $films = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            3
        );

        return $this->render('platformes/show.html.twig', [
            'platform' => $platform,
            'films' => $films
        ]);
    }
}
