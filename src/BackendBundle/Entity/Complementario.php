<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Complementario
 *
 * @ORM\Table(name="complementario")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\ComplementarioRepository")
 */
class Complementario
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
     * @ORM\Column(name="Nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Resultado", type="string", length=255)
     */
    private $resultado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $datetime;

    /**
     * @var HojaMedico
     *
     *
     * @ORM\ManyToOne(targetEntity="BackendBundle\Entity\HojaMedico", inversedBy="complemetarios")
     * @ORM\JoinColumn(name="hojamedico_id", referencedColumnName="id")
     */
    private $hojaMedico;

    /**
     * @var bool
     *
     * @ORM\Column(name="Cancelado", type="boolean", nullable=true)
     */
    private $cancelado;

    /**
     * @var string
     *
     * @ORM\Column(name="MotivoCancelado", type="string", length=255, nullable=true)
     */
    private $motivoCancelado;

    /**
     * @var LaboratorioUser
     *
     *
     * @ORM\ManyToOne(targetEntity="BackendBundle\Entity\LaboratorioUser", inversedBy="complementarios")
     * @ORM\JoinColumn(name="laboratorista_id", referencedColumnName="id")
     */
    private $laboratorista;



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
     * @return Complementario
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
     * Set resultado
     *
     * @param string $resultado
     *
     * @return Complementario
     */
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;

        return $this;
    }

    /**
     * Get resultado
     *
     * @return string
     */
    public function getResultado()
    {
        return $this->resultado;
    }

    /**
     * Set cancelado
     *
     * @param boolean $cancelado
     *
     * @return Complementario
     */
    public function setCancelado($cancelado)
    {
        $this->cancelado = $cancelado;

        return $this;
    }

    /**
     * Get cancelado
     *
     * @return bool
     */
    public function getCancelado()
    {
        return $this->cancelado;
    }

    /**
     * Set motivoCancelado
     *
     * @param string $motivoCancelado
     *
     * @return Complementario
     */
    public function setMotivoCancelado($motivoCancelado)
    {
        $this->motivoCancelado = $motivoCancelado;

        return $this;
    }

    /**
     * Get motivoCancelado
     *
     * @return string
     */
    public function getMotivoCancelado()
    {
        return $this->motivoCancelado;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return Complementario
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set paciente
     *
     * @param string $paciente
     *
     * @return Complementario
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
     * Set hojaMedico
     *
     * @param \BackendBundle\Entity\HojaMedico $hojaMedico
     *
     * @return Complementario
     */
    public function setHojaMedico(\BackendBundle\Entity\HojaMedico $hojaMedico = null)
    {
        $this->hojaMedico = $hojaMedico;
    
        return $this;
    }

    /**
     * Get hojaMedico
     *
     * @return \BackendBundle\Entity\HojaMedico
     */
    public function getHojaMedico()
    {
        return $this->hojaMedico;
    }

    /**
     * Set laboratorista
     *
     * @param \BackendBundle\Entity\LaboratorioUser $laboratorista
     *
     * @return Complementario
     */
    public function setLaboratorista(\BackendBundle\Entity\LaboratorioUser $laboratorista = null)
    {
        $this->laboratorista = $laboratorista;

        return $this;
    }

    /**
     * Get laboratorista
     *
     * @return \BackendBundle\Entity\LaboratorioUser
     */
    public function getLaboratorista()
    {
        return $this->laboratorista;
    }
}
