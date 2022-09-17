<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UsuarioRepository::class)
 */
class Usuario implements UserInterface, PasswordAuthenticatedUserInterface
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
     * @ORM\Column(name="codigo_rol_fk", type="string", length=200, nullable=true)
     */
    private $codigoRolFk;


    /**
     * Se implementan métodos de la clase User del core de Symfony además de los metodos de la entidad própia.
     *
     */
    public function serialize()
    {
        return serialize(array(
            $this->codigoUsuarioPk,
            $this->clave
        ));
    }

    public function unserialize($serialized)
    {
        list(
            $this->codigoUsuarioPk,
            $this->clave

            ) = unserialize($serialized);
    }

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

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     */
    public function setCorreo($correo): void
    {
        $this->correo = $correo;
    }

    /**
     * @return mixed
     */
    public function getCodigoIdentificacionFk()
    {
        return $this->codigoIdentificacionFk;
    }

    /**
     * @param mixed $codigoIdentificacionFk
     */
    public function setCodigoIdentificacionFk($codigoIdentificacionFk): void
    {
        $this->codigoIdentificacionFk = $codigoIdentificacionFk;
    }

    /**
     * @return mixed
     */
    public function getNumeroIdentificacion()
    {
        return $this->numeroIdentificacion;
    }

    /**
     * @param mixed $numeroIdentificacion
     */
    public function setNumeroIdentificacion($numeroIdentificacion): void
    {
        $this->numeroIdentificacion = $numeroIdentificacion;
    }

    /**
     * @return mixed
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * @param mixed $nombres
     */
    public function setNombres($nombres): void
    {
        $this->nombres = $nombres;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return mixed
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * @param mixed $clave
     */
    public function setClave($clave): void
    {
        $this->clave = $clave;
    }

    /**
     * @return mixed
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    /**
     * @param mixed $fechaRegistro
     */
    public function setFechaRegistro($fechaRegistro): void
    {
        $this->fechaRegistro = $fechaRegistro;
    }

    /**
     * @return mixed
     */
    public function getCodigoRolFk()
    {
        return $this->codigoRolFk;
    }

    /**
     * @param mixed $codigoRolFk
     */
    public function setCodigoRolFk($codigoRolFk): void
    {
        $this->codigoRolFk = $codigoRolFk;
    }


    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = explode(",", $this->getCodigoRolFk());
        return $roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @deprecated since Symfony 5.3
     */
    public function getUsername(): string
    {
        return $this->getCodigoUsuarioPk();
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->clave;
    }

    public function setPassword(string $password): self
    {
        $this->clave = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

}
