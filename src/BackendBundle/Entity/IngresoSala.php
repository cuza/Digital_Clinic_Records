<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IngresoSala
 *
 * @ORM\Table(name="ingreso_sala")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\IngresoSalaRepository")
 */
class IngresoSala
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
     * @var IngresoSala
     *
     *
     * @ORM\OneToOne(
     *     targetEntity="BackendBundle\Entity\Ingreso",
     *     inversedBy="salas"
     * )
     * @ORM\JoinColumn(name="ingresoId", referencedColumnName="id", unique=true)
     */
    private $ingreso;

    /**
     * @var IngresoSala
     *
     *
     * @ORM\OneToOne(
     *     targetEntity="BackendBundle\Entity\Sala",
     *     inversedBy="ingresos"
     * )
     * @ORM\JoinColumn(name="salaId", referencedColumnName="id", unique=true)
     */
    private $sala;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaEntrada", type="datetime")
     */
    private $fechaEntrada;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaSalida", type="datetime", nullable=true)
     */
    private $fechaSalida;


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
     * Set paciente
     *
     * @param string $paciente
     *
     * @return IngresoSala
     */
    public function setPaciente($paciente)
    {
        $this->paciente = $paciente;

        return $this;
    }

    /**
     * Get paciente
     *
     * @return string
     */
    public function getPaciente()
    {
        return $this->paciente;
    }

    /**
     * Set sala
     *
     * @param string $sala
     *
     * @return IngresoSala
     */
    public function setSala($sala)
    {
        $this->sala = $sala;

        return $this;
    }

    /**
     * Get sala
     *
     * @return string
     */
    public function getSala()
    {
        return $this->sala;
    }

    /**
     * Set fechaEntrada
     *
     * @param \DateTime $fechaEntrada
     *
     * @return IngresoSala
     */
    public function setFechaEntrada($fechaEntrada)
    {
        $this->fechaEntrada = $fechaEntrada;

        return $this;
    }

    /**
     * Get fechaEntrada
     *
     * @return \DateTime
     */
    public function getFechaEntrada()
    {
        return $this->fechaEntrada;
    }

    /**
     * Set fechaSalida
     *
     * @param \DateTime $fechaSalida
     *
     * @return IngresoSala
     */
    public function setFechaSalida($fechaSalida)
    {
        $this->fechaSalida = $fechaSalida;

        return $this;
    }

    /**
     * Get fechaSalida
     *
     * @return \DateTime
     */
    public function getFechaSalida()
    {
        return $this->fechaSalida;
    }

    /**
     * Set ingreso
     *
     * @param \BackendBundle\Entity\Ingreso $ingreso
     *
     * @return IngresoSala
     */
    public function setIngreso(\BackendBundle\Entity\Ingreso $ingreso = null)
    {
        $this->ingreso = $ingreso;

        return $this;
    }

    /**
     * Get ingreso
     *
     * @return \BackendBundle\Entity\Ingreso
     */
    public function getIngreso()
    {
        return $this->ingreso;
    }
}
