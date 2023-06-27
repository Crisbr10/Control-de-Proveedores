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
        $sql = 'SELECT * FROM Proveedores';
        $proveedores = $connection->fetchAllAssociative($sql);

        return $this->render('connect_db/index.html.twig', [
        'proveedores' => $proveedores,
        ]);
    }
}
