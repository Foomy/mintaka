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
        // @todo implement player class
        $player = [
            'name'       => 'SirFoomy',
            'location'   => 'London',
            'bankBlance' => 50000
        ];

        return $this->render('main/index.html.twig', [
            'codeLocation'       => __METHOD__,
            'plantationLocation' => false,
            'player'             => $player,
            'currency'           => 'EUR' // @todo implement currency class
        ]);
    }
}
