<?php

namespace Acme\BonitaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoIncidente
 *
 * @ORM\Table(name="tipo_incidente")
 * @ORM\Entity(repositoryClass="Acme\BonitaBundle\Repository\TipoIncidenteRepository")
 */
class TipoIncidente
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
     * @ORM\Column(name="tipoIncidente", type="string", length=255)
     */
    private $tipoIncidente;


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
     * Set tipoIncidente
     *
     * @param string $tipoIncidente
     *
     * @return TipoIncidente
     */
    public function setTipoIncidente($tipoIncidente)
    {
        $this->tipoIncidente = $tipoIncidente;

        return $this;
    }

    /**
     * Get tipoIncidente
     *
     * @return string
     */
    public function getTipoIncidente()
    {
        return $this->tipoIncidente;
    }
}

