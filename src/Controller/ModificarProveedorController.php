<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Connection;

class ModificarProveedorController extends AbstractController
{
    #[Route('/modificar/proveedor/{id}', name: 'modificar_proveedor')]
    public function index(Request $request, Connection $connection, int $id): Response
    {
        // Obtener los datos del proveedor a modificar
        $sql = 'SELECT * FROM Proveedores WHERE proveedor_id = ?';
        $proveedor = $connection->fetchAssociative($sql, [$id]);

        // Verificar si el proveedor existe
        if (!$proveedor) {
            throw $this->createNotFoundException('Proveedor no encontrado.');
        }

        if ($request->isMethod('POST')) {
            $nombre = $request->request->get('nombre');
            $correo = $request->request->get('correo');
            $telefono = $request->request->get('telefono');
            $tipoId = $request->request->get('tipo_id');
            $activo = $request->request->get('activo')=== '1'? 1 : 0;

            // Realizar la actualización en la base de datos
            $sql = 'UPDATE Proveedores SET nombre = ?, correo_electronico = ?, telefono_contacto = ?, tipo_id = ?, activo = ? WHERE proveedor_id = ?';
            $parameters = [$nombre, $correo, $telefono, $tipoId, $activo, $id];
            $connection->executeQuery($sql, $parameters);

            // Redireccionar a la página de listado de proveedores
            return $this->redirectToRoute('listado_de_proveedores');
        }

        return $this->render('modificar_proveedor/index.html.twig', [
            'proveedor' => $proveedor,
        ]);
    }
}
