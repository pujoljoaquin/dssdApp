<?php

namespace Acme\BonitaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Siniestro
 *
 * @ORM\Table(name="siniestro")
 * @ORM\Entity(repositoryClass="Acme\BonitaBundle\Repository\SiniestroRepository")
 */
class Siniestro
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
     * @var int
     *
     * @ORM\Column(name="nroCliente", type="integer")
     */
    private $nroCliente;

    /**
     * @var int
     *
     * @ORM\Column(name="tipo_incidente_id", type="integer")
     */
    private $tipoIncidenteId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaIncidente", type="datetime")
     */
    private $fechaIncidente;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidadObjetosIndemnizacion", type="integer")
     */
    private $cantidadObjetosIndemnizacion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcionSiniestro", type="string", length=255)
     */
    private $descripcionSiniestro;

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
     * Set nroCliente
     *
     * @param integer $nroCliente
     *
     * @return Siniestro
     */
    public function setNroCliente($nroCliente)
    {
        $this->nroCliente = $nroCliente;

        return $this;
    }

    /**
     * Get nroCliente
     *
     * @return int
     */
    public function getNroCliente()
    {
        return $this->nroCliente;
    }

    /**
     * Set tipoIncidenteId
     *
     * @param integer $tipoIncidenteId
     *
     * @return Siniestro
     */
    public function setTipoIncidenteId($tipoIncidenteId)
    {
        $this->tipoIncidenteId = $tipoIncidenteId;

        return $this;
    }

    /**
     * Get tipoIncidenteId
     *
     * @return int
     */
    public function getTipoIncidenteId()
    {
        return $this->tipoIncidenteId;
    }

    /**
     * Set fechaIncidente
     *
     * @param \DateTime $fechaIncidente
     *
     * @return Siniestro
     */
    public function setFechaIncidente($fechaIncidente)
    {
        $this->fechaIncidente = $fechaIncidente;

        return $this;
    }

    /**
     * Get fechaIncidente
     *
     * @return \DateTime
     */
    public function getFechaIncidente()
    {
        return $this->fechaIncidente;
    }

    /**
     * Set cantidadObjetosIndemnizacion
     *
     * @param integer $cantidadObjetosIndemnizacion
     *
     * @return Siniestro
     */
    public function setCantidadObjetosIndemnizacion($cantidadObjetosIndemnizacion)
    {
        $this->cantidadObjetosIndemnizacion = $cantidadObjetosIndemnizacion;

        return $this;
    }

    /**
     * Get cantidadObjetosIndemnizacion
     *
     * @return int
     */
    public function getCantidadObjetosIndemnizacion()
    {
        return $this->cantidadObjetosIndemnizacion;
    }

    /**
     * Set descripcionSiniestro
     *
     * @param string $descripcionSiniestro
     *
     * @return Siniestro
     */
    public function setDescripcionSiniestro($descripcionSiniestro)
    {
        $this->descripcionSiniestro = $descripcionSiniestro;

        return $this;
    }

    /**
     * Get descripcionSiniestro
     *
     * @return string
     */
    public function getDescripcionSiniestro()
    {
        return $this->descripcionSiniestro;
    }

    /**
     * Set objetosIndemnizacion
     *
     * @param array $objetosIndemnizacion
     *
     * @return Siniestro
     */
    public function setObjetosIndemnizacion($objetosIndemnizacion)
    {
        $this->objetosIndemnizacion = $objetosIndemnizacion;

        return $this;
    }

    /**
     * Get objetosIndemnizacion
     *
     * @return array
     */
    public function getObjetosIndemnizacion()
    {
        return $this->objetosIndemnizacion;
    }
}

