<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function index(): Response
    {
        $plantationLocation = true;

        // @todo implement player class
        $player = [
            'name'        => 'SirFoomy',
            'location'    => 'London',
            'bankBalance' => 50000
        ];

        $inGameDate = ($plantationLocation) ? '19. Jan. 1918' : '1. Jan. 1918';

        $plantation = [
            'size' => 0,
            'crop' => 'pasture'
        ];

        $auction = [
            'date'     => '13. Jan. 1918',
            'location' => 'London',
        ];

        return $this->render('main/index.html.twig', [
            'codeLocation'       => __METHOD__,
            'plantationLocation' => $plantationLocation,
            'player'             => $player,
            'currency'           => 'EUR', // @todo implement currency class
            'auction'            => $auction,
            'inGameDate'         => $inGameDate,
            'plantation'         => $plantation,
        ]);
    }
}
