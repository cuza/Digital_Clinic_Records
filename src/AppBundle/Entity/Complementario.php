<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Complementario
 *
 * @ORM\Table(name="complementario")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ComplementarioRepository")
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
     * @ORM\Column(name="Resultado", type="string", length=255, nullable=true)
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\HojaMedico", inversedBy="complemetarios")
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\LaboratorioUser", inversedBy="complementarios")
     * @ORM\JoinColumn(name="laboratorista_id", referencedColumnName="id")
     */
    private $laboratorista;


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
     * @return boolean
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
     * Set hojaMedico
     *
     * @param \AppBundle\Entity\HojaMedico $hojaMedico
     *
     * @return Complementario
     */
    public function setHojaMedico(\AppBundle\Entity\HojaMedico $hojaMedico = null)
    {
        $this->hojaMedico = $hojaMedico;

        return $this;
    }

    /**
     * Get hojaMedico
     *
     * @return \AppBundle\Entity\HojaMedico
     */
    public function getHojaMedico()
    {
        return $this->hojaMedico;
    }

    /**
     * Set laboratorista
     *
     * @param \AppBundle\Entity\LaboratorioUser $laboratorista
     *
     * @return Complementario
     */
    public function setLaboratorista(\AppBundle\Entity\LaboratorioUser $laboratorista = null)
    {
        $this->laboratorista = $laboratorista;

        return $this;
    }

    /**
     * Get laboratorista
     *
     * @return \AppBundle\Entity\LaboratorioUser
     */
    public function getLaboratorista()
    {
        return $this->laboratorista;
    }
}
