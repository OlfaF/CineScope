<?php

namespace App\Twig;

use App\Repository\PlatformeRepository;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

class PlatformExtension extends AbstractExtension implements GlobalsInterface
{
    public function __construct(
        private PlatformeRepository $platformeRepository
    ) {
    }

    public function getGlobals(): array
    {
        return [
            'all_platforms' => $this->platformeRepository->findAll(),
        ];
    }
}

