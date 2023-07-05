<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tiposproveedores
 *
 * @ORM\Table(name="TiposProveedores")
 * @ORM\Entity
 */
class Tiposproveedores
{
    /**
     * @var int
     *
     * @ORM\Column(name="tipo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tipoId;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=false)
     */
    private $nombre;

    public function getTipoId(): ?int
    {
        return $this->tipoId;
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

    public function __toString(): string
    {
        return $this->nombre;
    }


}
