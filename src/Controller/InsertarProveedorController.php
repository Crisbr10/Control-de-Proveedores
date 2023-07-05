<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Proveedores;
use App\Entity\Tiposproveedores;

class InsertarProveedorController extends AbstractController{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    
    #[Route('/insertar/proveedor', name: 'insertar_proveedor')]
    public function index(Request $request, Connection $connection): Response{
        if ($request->isMethod('POST')) {
            $nombre = $request->request->get('nombre');
            $correo = $request->request->get('correo');
            $telefono = $request->request->get('telefono');
            $tipo = $request->request->get('tipo_id');
            $tipo = $this->em->getRepository(Tiposproveedores::class)->find($tipo);
            $activo = $request->request->get('activo')=== 1? 1 : 0;

            // Crear una nueva instancia de Proveedores y asignar los valores
            $proveedor = new Proveedores();
            $proveedor->setNombre($nombre);
            $proveedor->setCorreoElectronico($correo);
            $proveedor->setTelefonoContacto($telefono);
            $proveedor->setTipo($tipo);
            $proveedor->setActivo($activo);
            $proveedor->setFechaCreacion(new \DateTime());
            $proveedor->setFechaActualizacion(new \DateTime());

            // Persistir y guardar el proveedor en la base de datos
            $this->em->persist($proveedor);
            $this->em->flush();

            // Redireccionar a la página de listado de proveedores
            return $this->redirectToRoute('app_lista_proveedores');
        }

        return $this->render('insertar_proveedor/index.html.twig');
    }
}

