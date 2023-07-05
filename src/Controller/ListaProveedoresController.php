<?php

namespace App\Controller;

use App\Entity\Proveedores;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListaProveedoresController extends AbstractController{
    private $em;

    /**
     * Constructor de la clase.
     * 
     * @param EntityManagerInterface $em El administrador de entidades de Doctrine
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Controlador para la ruta "/lista/proveedores".
     * 
     * @Route("/lista/proveedores", name="app_lista_proveedores")
     */
    public function index(): Response
    {
        // Obtener todos los proveedores desde el repositorio de la entidad "Proveedores"
        $proveedores = $this->em->getRepository(Proveedores::class)->findAll();
        
        // Renderizar la plantilla Twig 'lista_proveedores/index.html.twig' y pasar la lista de proveedores como contexto
        return $this->render('lista_proveedores/index.html.twig', [
            'proveedores' => $proveedores
        ]);
    }
}
