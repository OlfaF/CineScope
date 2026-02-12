<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PlatformesController extends AbstractController
{
    #[Route('/platformes', name: 'app_platformes')]
    public function index(): Response
    {
        return $this->render('platformes/index.html.twig', [
            'controller_name' => 'PlatformesController',
        ]);
    }
}
