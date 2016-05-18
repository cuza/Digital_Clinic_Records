<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consultas
 *
 * @ORM\Table(name="consultas")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\ConsultasRepository")
 */
class Consultas
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
     * @ORM\Column(name="Servicio", type="string", length=255)
     */
    private $servicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="hojaMedico", type="string", length=255)
     */
    private $hojaMedico;

    /**
     * @var string
     *
     * @ORM\Column(name="Complementarios", type="string", length=255)
     */
    private $complementarios;


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
     * Set servicio
     *
     * @param string $servicio
     *
     * @return Consultas
     */
    public function setServicio($servicio)
    {
        $this->servicio = $servicio;

        return $this;
    }

    /**
     * Get servicio
     *
     * @return string
     */
    public function getServicio()
    {
        return $this->servicio;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Consultas
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set hojaMedico
     *
     * @param string $hojaMedico
     *
     * @return Consultas
     */
    public function setHojaMedico($hojaMedico)
    {
        $this->hojaMedico = $hojaMedico;

        return $this;
    }

    /**
     * Get hojaMedico
     *
     * @return string
     */
    public function getHojaMedico()
    {
        return $this->hojaMedico;
    }

    /**
     * Set complementarios
     *
     * @param string $complementarios
     *
     * @return Consultas
     */
    public function setComplementarios($complementarios)
    {
        $this->complementarios = $complementarios;

        return $this;
    }

    /**
     * Get complementarios
     *
     * @return string
     */
    public function getComplementarios()
    {
        return $this->complementarios;
    }
}

