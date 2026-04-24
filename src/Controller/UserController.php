<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserController extends AbstractController
{
    #[Route('/users', name: 'users')]
    public function index(): Response
    {
        return $this->render('user/list.html.twig', [
            'controller_method' => __METHOD__,
        ]);
    }

    #[Route('/user/register', name: 'register')]
    public function register(): Response
    {
        return $this->render('user/register.html.twig', [
            'controller_method' => __METHOD__,
        ]);
    }

    #[Route('/user/login', name: 'login')]
    public function login(): Response
    {
        return $this->render('user/login.html.twig', [
            'controller_method' => __METHOD__,
        ]);
    }
}
