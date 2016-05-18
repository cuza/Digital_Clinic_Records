<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IngresoSala
 *
 * @ORM\Table(name="ingreso_sala")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IngresoSalaRepository")
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
     *     targetEntity="AppBundle\Entity\Ingreso",
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
     *     targetEntity="AppBundle\Entity\Sala",
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
     * @return integer
     */
    public function getId()
    {
        return $this->id;
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
     * @param \AppBundle\Entity\Ingreso $ingreso
     *
     * @return IngresoSala
     */
    public function setIngreso(\AppBundle\Entity\Ingreso $ingreso = null)
    {
        $this->ingreso = $ingreso;

        return $this;
    }

    /**
     * Get ingreso
     *
     * @return \AppBundle\Entity\Ingreso
     */
    public function getIngreso()
    {
        return $this->ingreso;
    }

    /**
     * Set sala
     *
     * @param \AppBundle\Entity\Sala $sala
     *
     * @return IngresoSala
     */
    public function setSala(\AppBundle\Entity\Sala $sala = null)
    {
        $this->sala = $sala;

        return $this;
    }

    /**
     * Get sala
     *
     * @return \AppBundle\Entity\Sala
     */
    public function getSala()
    {
        return $this->sala;
    }
}
