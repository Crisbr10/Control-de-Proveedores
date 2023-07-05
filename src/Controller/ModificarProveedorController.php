<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Proveedores;
use App\Entity\Tiposproveedores;

class ModificarProveedorController extends AbstractController{

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
    
    #[Route('/modificar/proveedor/{id}', name: 'modificar_proveedor')]
    public function index(Request $request, $id): Response{
       
        $proveedor = $this->em->getRepository(Proveedores::class)->find($id);

        // Verificar si el proveedor existe
        if (!$proveedor) {
            throw $this->createNotFoundException('Proveedor no encontrado.');
        }

        if ($request->isMethod('POST')) {
            $nombre = $request->request->get('nombre');
            $correo = $request->request->get('correo');
            $telefono = $request->request->get('telefono');
            $tipo = $request->request->get('tipo_id');
            $tipo = $this->em->getRepository(Tiposproveedores::class)->find($tipo);
            $activo = $request->request->get('activo')=== 1? 1 : 0;

            // Actualizar los datos del proveedor
            $proveedor->setNombre($nombre);
            $proveedor->setCorreoElectronico($correo);
            $proveedor->setTelefonoContacto($telefono);
            $proveedor->setTipo($tipo);
            $proveedor->setActivo($activo);

            $this->em->flush();

            // Redireccionar a la página de listado de proveedores
            return $this->redirectToRoute('app_lista_proveedores');
        }

        return $this->render('modificar_proveedor/index.html.twig', [
            'proveedor' => $proveedor,
        ]);
    }
}
