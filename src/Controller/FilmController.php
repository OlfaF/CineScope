<?php

namespace App\Controller;

use App\Repository\FilmRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Film;


final class FilmController extends AbstractController
{
    #[Route('/films', name: 'film_index_public')]
    public function index(
        FilmRepository $filmRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response {
        $query = $filmRepository->createQueryBuilder('f')->getQuery();

        $films = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            5 // nombre de films par page
        );

        return $this->render('film/index.html.twig', [
            'films' => $films,
        ]);
    }

    #[Route('/films/{id}', name: 'film_show')]
    public function show(Film $film): Response
    {
        return $this->render('film/show.html.twig', [
            'film' => $film,
        ]);
    }
}
