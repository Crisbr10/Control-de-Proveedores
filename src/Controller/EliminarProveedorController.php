<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Connection;

class EliminarProveedorController extends AbstractController
{
    #[Route('/proveedores/eliminar/{id}', name: 'eliminar_proveedor')]
    public function eliminar(Connection $connection, $id): Response
    {
        // Realizar la eliminación en la base de datos
        $sql = 'DELETE FROM Proveedores WHERE proveedor_id = ?';
        $connection->executeQuery($sql, [$id]);

        // Redireccionar a la página de listado de proveedores
        return $this->redirectToRoute('listado_de_proveedores');
    }
}
