<?php

namespace Acme\BonitaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoEmpleado
 *
 * @ORM\Table(name="tipo_empleado")
 * @ORM\Entity
 */
class TipoEmpleado
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
     * @ORM\Column(name="tipoEmpleado", type="string", length=255, nullable=false)
     */
    protected $tipoEmpleado;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

     /**
     * Set id
     *
     * @param integer $id
     * @return TipoEmpleado
     */
    public function setId($id){
        return $this->id = $id;
    }

    /**
     * Set tipoEmpleado
     *
     * @param string $tipoEmpleado
     *
     * @return TipoEmpleado
     */
    public function setTipoEmpleado($tipoEmpleado)
    {
        $this->tipoEmpleado = $tipoEmpleado;

        return $this;
    }

    /**
     * Get tipoEmpleado
     *
     * @return string
     */
    public function getTipoEmpleado()
    {
        return $this->tipoEmpleado;
    }

    public function __toString() {
        return $this->tipoEmpleado;
    }
}

