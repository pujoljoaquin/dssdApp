<?php

namespace Acme\BonitaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ObjetoIndemnizacionSiniestro
 *
 * @ORM\Table(name="objeto_indemnizacion_siniestro")
 * @ORM\Entity(repositoryClass="Acme\BonitaBundle\Repository\ObjetoIndemnizacionSiniestroRepository")
 */
class ObjetoIndemnizacionSiniestro
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
     * @ORM\Column(name="siniestro_id", type="integer")
     */
    private $siniestroId;

    /**
     * @var int
     *
     * @ORM\Column(name="objeto_indemnizacion_id", type="integer")
     */
    private $objetoIndemnizacionId;


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
     * Set siniestroId
     *
     * @param integer $siniestroId
     *
     * @return ObjetoIndemnizacionSiniestro
     */
    public function setSiniestroId($siniestroId)
    {
        $this->siniestroId = $siniestroId;

        return $this;
    }

    /**
     * Get siniestroId
     *
     * @return int
     */
    public function getSiniestroId()
    {
        return $this->siniestroId;
    }

    /**
     * Set objetoIndemnizacionId
     *
     * @param integer $objetoIndemnizacionId
     *
     * @return ObjetoIndemnizacionSiniestro
     */
    public function setObjetoIndemnizacionId($objetoIndemnizacionId)
    {
        $this->objetoIndemnizacionId = $objetoIndemnizacionId;

        return $this;
    }

    /**
     * Get objetoIndemnizacionId
     *
     * @return int
     */
    public function getObjetoIndemnizacionId()
    {
        return $this->objetoIndemnizacionId;
    }
}

