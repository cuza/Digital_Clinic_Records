<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ingreso
 *
 * @ORM\Table(name="Ingreso")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\IngresoRepository")
 */
class Ingreso
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
     * @var \DateTime
     *
     * @ORM\Column(name="fechaIngreso", type="datetime")
     */
    private $fechaIngreso;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaSalida", type="datetime", nullable=true)
     */
    private $fechaSalida;

    /**
     * @var Paciente
     *
     *
     * @ORM\ManyToOne(targetEntity="BackendBundle\Entity\Paciente", inversedBy="ingresos")
     * @ORM\JoinColumn(name="paciente_id", referencedColumnName="id")
     */
    private $paciente;

    /**
     * @var Ingreso
     * @ORM\OneToOne(
     *     targetEntity="BackendBundle\Entity\IngresoSala",
     *     mappedBy="ingresos"
     * )
     */
    private $salas;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoIngreso", type="string", length=255, nullable=true)
     */
    private $tipoIngreso;

    /**
     * @var string
     *
     * @ORM\Column(name="Procedencia", type="string", length=255, nullable=true)
     */
    private $procedencia;

    /**
     * @var string
     *
     * @ORM\Column(name="EstadoEgreso", type="string", length=255, nullable=true)
     */
    private $estadoEgreso;

    /**
     * @var bool
     *
     * @ORM\Column(name="Necropsia", type="boolean", nullable=true)
     */
    private $necropsia;

    /**
     * @var string
     *
     * @ORM\Column(name="RepercusionIncapacidadFisica", type="string", length=255, nullable=true)
     */
    private $repercusionIncapacidadFisica;

    /**
     * @var string
     *
     * @ORM\Column(name="Seguimiento", type="string", length=255, nullable=true)
     */
    private $seguimiento;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\HojaEnfermeria", mappedBy="ingresoId")
     */
    private $hojasEnfermeria1;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\HojaEnfermeria2", mappedBy="ingresoId")
     */
    private $hojasEnfermeria2;


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
     * Set fechaIngreso
     *
     * @param \DateTime $fechaIngreso
     *
     * @return Ingreso
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    /**
     * Get fechaIngreso
     *
     * @return \DateTime
     */
    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }

    /**
     * Set fechaSalida
     *
     * @param \DateTime $fechaSalida
     *
     * @return Ingreso
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
     * Set paciente
     *
     * @param string $paciente
     *
     * @return Ingreso
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
     * @return Ingreso
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
     * Set tipoIngreso
     *
     * @param string $tipoIngreso
     *
     * @return Ingreso
     */
    public function setTipoIngreso($tipoIngreso)
    {
        $this->tipoIngreso = $tipoIngreso;

        return $this;
    }

    /**
     * Get tipoIngreso
     *
     * @return string
     */
    public function getTipoIngreso()
    {
        return $this->tipoIngreso;
    }

    /**
     * Set procedencia
     *
     * @param string $procedencia
     *
     * @return Ingreso
     */
    public function setProcedencia($procedencia)
    {
        $this->procedencia = $procedencia;

        return $this;
    }

    /**
     * Get procedencia
     *
     * @return string
     */
    public function getProcedencia()
    {
        return $this->procedencia;
    }

    /**
     * Set estadoEgreso
     *
     * @param string $estadoEgreso
     *
     * @return Ingreso
     */
    public function setEstadoEgreso($estadoEgreso)
    {
        $this->estadoEgreso = $estadoEgreso;

        return $this;
    }

    /**
     * Get estadoEgreso
     *
     * @return string
     */
    public function getEstadoEgreso()
    {
        return $this->estadoEgreso;
    }

    /**
     * Set repercusionIncapacidadFisica
     *
     * @param string $repercusionIncapacidadFisica
     *
     * @return Ingreso
     */
    public function setRepercusionIncapacidadFisica($repercusionIncapacidadFisica)
    {
        $this->repercusionIncapacidadFisica = $repercusionIncapacidadFisica;

        return $this;
    }

    /**
     * Get repercusionIncapacidadFisica
     *
     * @return string
     */
    public function getRepercusionIncapacidadFisica()
    {
        return $this->repercusionIncapacidadFisica;
    }

    /**
     * Set necropsia
     *
     * @param boolean $necropsia
     *
     * @return Ingreso
     */
    public function setNecropsia($necropsia)
    {
        $this->necropsia = $necropsia;

        return $this;
    }

    /**
     * Get necropsia
     *
     * @return bool
     */
    public function getNecropsia()
    {
        return $this->necropsia;
    }

    /**
     * Set seguimiento
     *
     * @param string $seguimiento
     *
     * @return Ingreso
     */
    public function setSeguimiento($seguimiento)
    {
        $this->seguimiento = $seguimiento;

        return $this;
    }

    /**
     * Get seguimiento
     *
     * @return string
     */
    public function getSeguimiento()
    {
        return $this->seguimiento;
    }

    /**
     * Set salas
     *
     * @param \BackendBundle\Entity\Sala $salas
     *
     * @return Ingreso
     */
    public function setSalas(\BackendBundle\Entity\Sala $salas = null)
    {
        $this->salas = $salas;

        return $this;
    }

    /**
     * Get salas
     *
     * @return \BackendBundle\Entity\Sala
     */
    public function getSalas()
    {
        return $this->salas;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->hojasEnfermeria1 = new \Doctrine\Common\Collections\ArrayCollection();
        $this->hojasEnfermeria2 = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add hojasEnfermeria1
     *
     * @param \BackendBundle\Entity\HojaEnfermeria $hojasEnfermeria1
     *
     * @return Ingreso
     */
    public function addHojasEnfermeria1(\BackendBundle\Entity\HojaEnfermeria $hojasEnfermeria1)
    {
        $this->hojasEnfermeria1[] = $hojasEnfermeria1;

        return $this;
    }

    /**
     * Remove hojasEnfermeria1
     *
     * @param \BackendBundle\Entity\HojaEnfermeria $hojasEnfermeria1
     */
    public function removeHojasEnfermeria1(\BackendBundle\Entity\HojaEnfermeria $hojasEnfermeria1)
    {
        $this->hojasEnfermeria1->removeElement($hojasEnfermeria1);
    }

    /**
     * Get hojasEnfermeria1
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHojasEnfermeria1()
    {
        return $this->hojasEnfermeria1;
    }

    /**
     * Add hojasEnfermeria2
     *
     * @param \BackendBundle\Entity\HojaEnfermeria2 $hojasEnfermeria2
     *
     * @return Ingreso
     */
    public function addHojasEnfermeria2(\BackendBundle\Entity\HojaEnfermeria2 $hojasEnfermeria2)
    {
        $this->hojasEnfermeria2[] = $hojasEnfermeria2;

        return $this;
    }

    /**
     * Remove hojasEnfermeria2
     *
     * @param \BackendBundle\Entity\HojaEnfermeria2 $hojasEnfermeria2
     */
    public function removeHojasEnfermeria2(\BackendBundle\Entity\HojaEnfermeria2 $hojasEnfermeria2)
    {
        $this->hojasEnfermeria2->removeElement($hojasEnfermeria2);
    }

    /**
     * Get hojasEnfermeria2
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHojasEnfermeria2()
    {
        return $this->hojasEnfermeria2;
    }
}
