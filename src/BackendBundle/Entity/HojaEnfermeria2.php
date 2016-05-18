<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HojaEnfermeria2
 *
 * @ORM\Table(name="hoja_enfermeria2")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\HojaEnfermeria2Repository")
 */
class HojaEnfermeria2
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
     * @var EnfermeroUser
     *
     *
     * @ORM\ManyToOne(targetEntity="BackendBundle\Entity\EnfermeroUser", inversedBy="hojasEnfermeria2")
     * @ORM\JoinColumn(name="enfermero_id", referencedColumnName="id")
     */
    private $enfermero;

    /**
     * @var int
     *
     * @ORM\Column(name="liquido", type="integer")
     */
    private $liquido;

    /**
     * @var int
     *
     * @ORM\Column(name="deposiciones", type="integer")
     */
    private $deposiciones;

    /**
     * @var int
     *
     * @ORM\Column(name="orina", type="integer")
     */
    private $orina;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", unique=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="ingresoId", type="string", length=255)
     */
    private $ingresoId;


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
     * Set liquido
     *
     * @param integer $liquido
     *
     * @return HojaEnfermeria2
     */
    public function setLiquido($liquido)
    {
        $this->liquido = $liquido;

        return $this;
    }

    /**
     * Get liquido
     *
     * @return integer
     */
    public function getLiquido()
    {
        return $this->liquido;
    }

    /**
     * Set deposiciones
     *
     * @param integer $deposiciones
     *
     * @return HojaEnfermeria2
     */
    public function setDeposiciones($deposiciones)
    {
        $this->deposiciones = $deposiciones;

        return $this;
    }

    /**
     * Get deposiciones
     *
     * @return integer
     */
    public function getDeposiciones()
    {
        return $this->deposiciones;
    }

    /**
     * Set orina
     *
     * @param integer $orina
     *
     * @return HojaEnfermeria2
     */
    public function setOrina($orina)
    {
        $this->orina = $orina;

        return $this;
    }

    /**
     * Get orina
     *
     * @return integer
     */
    public function getOrina()
    {
        return $this->orina;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return HojaEnfermeria2
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set enfermero
     *
     * @param \BackendBundle\Entity\EnfermeroUser $enfermero
     *
     * @return HojaEnfermeria2
     */
    public function setEnfermero(\BackendBundle\Entity\EnfermeroUser $enfermero = null)
    {
        $this->enfermero = $enfermero;

        return $this;
    }

    /**
     * Get enfermero
     *
     * @return \BackendBundle\Entity\EnfermeroUser
     */
    public function getEnfermero()
    {
        return $this->enfermero;
    }

    /**
     * Set ingresoId
     *
     * @param string $ingresoId
     *
     * @return HojaEnfermeria2
     */
    public function setIngresoId($ingresoId)
    {
        $this->ingresoId = $ingresoId;

        return $this;
    }

    /**
     * Get ingresoId
     *
     * @return string
     */
    public function getIngresoId()
    {
        return $this->ingresoId;
    }
}
