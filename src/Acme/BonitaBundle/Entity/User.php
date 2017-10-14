<?php

namespace Acme\BonitaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    protected $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=255, nullable=false)
     */
    protected $apellido;

    /**
     * @var int
     *
     * @ORM\Column(name="documento", type="integer", nullable=false)
     */
    protected $documento;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo_empleado_id", type="integer", nullable=false)
    */
    protected $tipo_empleado_id;

    public function __construct(){
            parent::__construct();
            $this->roles = array('ROLE_USER');
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return User
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     *
     * @return User
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set documento
     *
     * @param integer $documento
     *
     * @return User
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get documento
     *
     * @return int
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Get tipo_empleado_id
     *
     * @return integer
     */
    public function getTipoEmpleadoId(){
        return $this->tipo_empleado_id;
    }

    /**
     * Set tipo_empleado_id
     *
     * @param integer $tipo_empleado_id
     * @return User
     */
    public function setTipoEmpleadoId($tipo_empleado_id){
        return $this->tipo_empleado_id = $tipo_empleado_id;
    }

    public function getRole(){
        $size = sizeof($this->getRoles());
        return $this->getRoles()[$size - 1];
    }

}

