<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Connection;

class InsertarProveedorController extends AbstractController{
    #[Route('/insertar/proveedor', name: 'insertar_proveedor')]
    public function index(Request $request, Connection $connection): Response{
        if ($request->isMethod('POST')) {
            $nombre = $request->request->get('nombre');
            $correo = $request->request->get('correo');
            $telefono = $request->request->get('telefono');
            $tipoId = $request->request->get('tipo_id');
            $activo = $request->request->get('activo')=== '1'? 1 : 0;

            // Realizar la inserción en la base de datos
            $sql = 'INSERT INTO Proveedores (nombre, correo_electronico, telefono_contacto, tipo_id, activo)
                    VALUES (?, ?, ?, ?, ?)';
            $parameters = [$nombre, $correo, $telefono, $tipoId, $activo];
            $connection->executeQuery($sql, $parameters);

            // Redireccionar a la página de listado de proveedores
            return $this->redirectToRoute('listado_de_proveedores');
        }

        return $this->render('insertar_proveedor/index.html.twig');
    }
}

