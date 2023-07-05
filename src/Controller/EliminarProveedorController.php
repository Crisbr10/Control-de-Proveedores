<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
USE Doctrine\ORM\EntityManagerInterface;
use App\Entity\Proveedores;


class EliminarProveedorController extends AbstractController{

    private $em;
    /**
     * Constructor de la clase.
     * 
     * @param EntityManagerInterface $em El administrador de entidades de Doctrine
     */
   
    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
    }

    #[Route('/proveedores/eliminar/{id}', name: 'eliminar_proveedor')]
    public function eliminar(Request $request, $id): Response
    {
        // Realizar la eliminación en la base de datos
        $proveedor = $this->em->getRepository(Proveedores::class)->find($id);

        $this->em->remove($proveedor);
        $this->em->flush();

        // Redireccionar a la página de listado de proveedores
        return $this->redirectToRoute('app_lista_proveedores');
    }
}
