<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Connection;

class ConnectDBController extends AbstractController
{
    #[Route('/connect/d/b', name: 'listado_de_proveedores')]
    public function index(Connection $connection): Response
    {
        $sql = 'SELECT P.proveedor_id,P.nombre, P.correo_electronico, P.telefono_contacto, TP.nombre AS tipo_nombre, P.activo, DATE(P.fecha_creacion) AS fecha_creacion, DATE(P.fecha_actualizacion) AS fecha_actualizacion
                FROM Proveedores P
                JOIN TiposProveedores TP ON P.tipo_id = TP.tipo_id';
        $proveedores = $connection->fetchAllAssociative($sql);

        return $this->render('connect_db/index.html.twig', [
        'proveedores' => $proveedores,
        ]);
    }
}
