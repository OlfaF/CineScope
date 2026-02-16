<?php

namespace App\Controller;

use App\Repository\FilmRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        FilmRepository $filmRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response
    {
        $query = $filmRepository
            ->createQueryBuilder('f')
            ->orderBy('f.releaseYear', 'DESC')
            ->getQuery();

        $films = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            3
        );

        return $this->render('home/index.html.twig', [
            'films' => $films,
        ]);
    }
}
