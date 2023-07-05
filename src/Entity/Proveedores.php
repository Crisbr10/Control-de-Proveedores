<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Proveedores
 *
 * @ORM\Table(name="Proveedores", indexes={@ORM\Index(name="tipo_id", columns={"tipo_id"})})
 * @ORM\Entity
 */
class Proveedores
{
    /**
     * @var int
     *
     * @ORM\Column(name="proveedor_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $proveedorId;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_electronico", type="string", length=255, nullable=false)
     */
    private $correoElectronico;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_contacto", type="string", length=20, nullable=false)
     */
    private $telefonoContacto;

    /**
     * @var bool
     *
     * @ORM\Column(name="activo", type="boolean", nullable=false, options={"default"="1"})
     */
    private $activo = true;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_creacion", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $fechaCreacion = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_actualizacion", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $fechaActualizacion = 'CURRENT_TIMESTAMP';

    /**
     * @var \Tiposproveedores|null
     *
     * @ORM\ManyToOne(targetEntity="Tiposproveedores")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_id", referencedColumnName="tipo_id")
     * })
     */
    private $tipo;

    public function getProveedorId(): ?int
    {
        return $this->proveedorId;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCorreoElectronico(): ?string
    {
        return $this->correoElectronico;
    }

    public function setCorreoElectronico(string $correoElectronico): static
    {
        $this->correoElectronico = $correoElectronico;

        return $this;
    }

    public function getTelefonoContacto(): ?string
    {
        return $this->telefonoContacto;
    }

    public function setTelefonoContacto(string $telefonoContacto): static
    {
        $this->telefonoContacto = $telefonoContacto;

        return $this;
    }

    public function isActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): static
    {
        $this->activo = $activo;

        return $this;
    }

    public function getTipo(): ?Tiposproveedores
    {
        return $this->tipo;
    }

    public function setTipo(?Tiposproveedores $tipo): static
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getFechaCreacion(): ?string
    {
        return $this->fechaCreacion ? $this->fechaCreacion->format('Y-m-d') : null;
    }

    public function setFechaCreacion(?\DateTimeInterface $fechaCreacion): static
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    public function getFechaActualizacion(): ?string
    {
        return $this->fechaActualizacion ? $this->fechaActualizacion->format('Y-m-d') : null;
    }

    public function setFechaActualizacion(?\DateTimeInterface $fechaActualizacion): static
    {
        $this->fechaActualizacion = $fechaActualizacion;

        return $this;
    }

    

}
