<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InsertarProveedorController extends AbstractController
{
    #[Route('/insertar/proveedor', name: 'app_insertar_proveedor')]
    public function index(): Response
    {
        return $this->render('insertar_proveedor/index.html.twig', [
            'controller_name' => 'InsertarProveedorController',
        ]);
    }
}
