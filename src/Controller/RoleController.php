<?php

namespace App\Controller;

use App\Form\RoleType;
use App\Repository\RoleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RoleController extends AbstractController
{
    #[Route('/roles', name: 'roles')]
    public function index(RoleRepository $roleRepository): Response
    {
        $roles = $roleRepository->findAll();

        return $this->render('role/index.html.twig', [
            'controller_name' => 'RoleController',
            'roles'           => $roles,
        ]);
    }

    #[Route('/role/add', name: 'add_role')]
    public function add(Request $request, RoleRepository $roleRepository): Response
    {
        $form = $this->createForm(RoleType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $role = $form->getData();
            $roleRepository->save($role);
        }

        return $this->render('role/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/role/details/{roleId}', name: 'role_details')]
    public function details(Request $request, RoleRepository $roleRepository, int $roleId): Response
    {
        return $this->render('role/details.html.twig', [
        ]);
    }
}
