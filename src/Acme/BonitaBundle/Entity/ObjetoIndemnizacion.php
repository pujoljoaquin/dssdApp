<?php

namespace Acme\BonitaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ObjetoIndemnizacion
 *
 * @ORM\Table(name="objeto_indemnizacion")
 * @ORM\Entity(repositoryClass="Acme\BonitaBundle\Repository\ObjetoIndemnizacionRepository")
 */
class ObjetoIndemnizacion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var int
     *
     * @ORM\Column(name="siniestro_id", type="integer")
     */
    private $siniestro_id;


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
     * @return ObjetoIndemnizacion
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
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return ObjetoIndemnizacion
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return int
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return ObjetoIndemnizacion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set siniestroId
     *
     * @param integer $siniestroId
     *
     * @return ObjetoIndemnizacion
     */
    public function setSiniestroId($siniestroId)
    {
        $this->siniestro_id = $siniestroId;

        return $this;
    }

    /**
     * Get siniestroId
     *
     * @return int
     */
    public function getSiniestroId()
    {
        return $this->siniestro_id;
    }
}

