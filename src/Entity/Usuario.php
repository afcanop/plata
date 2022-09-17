<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuarioRepository::class)
 */
class Usuario
{
    /**
     * @ORM\Column(name="codigo_usuario_pk",type="string")
     * @ORM\Id
     */
    private $codigoUsuarioPk;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $correo;

    /**
     * @ORM\Column(name="codigo_identificacion_fk", type="string", length=3, nullable=true)
     */
    private $codigoIdentificacionFk;

    /**
     * @ORM\Column(name="numero_identificacion", type="string", length=20 ,nullable=false)
     */
    private $numeroIdentificacion;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $nombres;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $apellidos;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $clave;

    /**
     * @ORM\Column(name="fecha_registro", type="datetime", nullable=true)
     */
    private $fechaRegistro;

    /**
     * @return mixed
     */
    public function getCodigoUsuarioPk()
    {
        return $this->codigoUsuarioPk;
    }

    /**
     * @param mixed $codigoUsuarioPk
     */
    public function setCodigoUsuarioPk($codigoUsuarioPk): void
    {
        $this->codigoUsuarioPk = $codigoUsuarioPk;
    }


}
