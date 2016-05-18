<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consulta
 *
 * @ORM\Table(name="consulta")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\ConsultaRepository")
 */
class Consulta
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
     * @var Paciente
     *
     *
     * @ORM\ManyToOne(targetEntity="BackendBundle\Entity\Paciente", inversedBy="consultas")
     * @ORM\JoinColumn(name="paciente_id", referencedColumnName="id")
     */
    private $paciente;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\HojaMedico", mappedBy="consultas")
     */
    private $hojasMedico;


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
     * @return Consulta
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
     * @return Consulta
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
     * @return Consulta
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
     * Constructor
     */
    public function __construct()
    {
        $this->hojasMedico = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add hojasMedico
     *
     * @param \BackendBundle\Entity\HojaMedico $hojasMedico
     *
     * @return Consulta
     */
    public function addHojasMedico(\BackendBundle\Entity\HojaMedico $hojasMedico)
    {
        $this->hojasMedico[] = $hojasMedico;

        return $this;
    }

    /**
     * Remove hojasMedico
     *
     * @param \BackendBundle\Entity\HojaMedico $hojasMedico
     */
    public function removeHojasMedico(\BackendBundle\Entity\HojaMedico $hojasMedico)
    {
        $this->hojasMedico->removeElement($hojasMedico);
    }

    /**
     * Get hojasMedico
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHojasMedico()
    {
        return $this->hojasMedico;
    }

    /**
     * Set paciente
     *
     * @param \BackendBundle\Entity\Paciente $paciente
     *
     * @return Consulta
     */
    public function setPaciente(\BackendBundle\Entity\Paciente $paciente = null)
    {
        $this->paciente = $paciente;

        return $this;
    }

    /**
     * Get paciente
     *
     * @return \BackendBundle\Entity\Paciente
     */
    public function getPaciente()
    {
        return $this->paciente;
    }
}
