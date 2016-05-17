<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HojaEnfermeria
 *
 * @ORM\Table(name="hoja_enfermeria")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\HojaEnfermeriaRepository")
 */
class HojaEnfermeria
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
     * @ORM\ManyToOne(targetEntity="BackendBundle\Entity\EnfermeroUser", inversedBy="datos1")
     * @ORM\JoinColumn(name="enfermero_id", referencedColumnName="id")
     */
    private $enfermero;

    /**
     * @var int
     *
     * @ORM\Column(name="temperatura", type="integer")
     */
    private $temperatura;

    /**
     * @var int
     *
     * @ORM\Column(name="pulso", type="integer")
     */
    private $pulso;

    /**
     * @var int
     *
     * @ORM\Column(name="respiracion", type="integer")
     */
    private $respiracion;

    /**
     * @var int
     *
     * @ORM\Column(name="TensionArterialMin", type="integer")
     */
    private $tensionArterialMin;

    /**
     * @var int
     *
     * @ORM\Column(name="TensionArterialMax", type="integer")
     */
    private $tensionArterialMax;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $datetime;

    /**
     * @var string
     *
     * @ORM\Column(name="ingresoId", type="string", length=255)
     */
    private $ingresoId;


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
     * Set enfermeroUser
     *
     * @param string $enfermeroUser
     *
     * @return HojaEnfermeria
     */
    public function setEnfermeroUser($enfermeroUser)
    {
        $this->enfermeroUser = $enfermeroUser;

        return $this;
    }

    /**
     * Get enfermeroUser
     *
     * @return string
     */
    public function getEnfermeroUser()
    {
        return $this->enfermeroUser;
    }

    /**
     * Set temperatura
     *
     * @param integer $temperatura
     *
     * @return HojaEnfermeria
     */
    public function setTemperatura($temperatura)
    {
        $this->temperatura = $temperatura;

        return $this;
    }

    /**
     * Get temperatura
     *
     * @return int
     */
    public function getTemperatura()
    {
        return $this->temperatura;
    }

    /**
     * Set pulso
     *
     * @param integer $pulso
     *
     * @return HojaEnfermeria
     */
    public function setPulso($pulso)
    {
        $this->pulso = $pulso;

        return $this;
    }

    /**
     * Get pulso
     *
     * @return int
     */
    public function getPulso()
    {
        return $this->pulso;
    }

    /**
     * Set respiracion
     *
     * @param integer $respiracion
     *
     * @return HojaEnfermeria
     */
    public function setRespiracion($respiracion)
    {
        $this->respiracion = $respiracion;

        return $this;
    }

    /**
     * Get respiracion
     *
     * @return int
     */
    public function getRespiracion()
    {
        return $this->respiracion;
    }

    /**
     * Set tensionArterial
     *
     * @param integer $tensionArterial
     *
     * @return HojaEnfermeria
     */
    public function setTensionArterial($tensionArterial)
    {
        $this->tensionArterial = $tensionArterial;

        return $this;
    }

    /**
     * Get tensionArterial
     *
     * @return int
     */
    public function getTensionArterial()
    {
        return $this->tensionArterial;
    }

    /**
     * Set tensionArterialMax
     *
     * @param integer $tensionArterialMax
     *
     * @return HojaEnfermeria
     */
    public function setTensionArterialMax($tensionArterialMax)
    {
        $this->tensionArterialMax = $tensionArterialMax;

        return $this;
    }

    /**
     * Get tensionArterialMax
     *
     * @return int
     */
    public function getTensionArterialMax()
    {
        return $this->tensionArterialMax;
    }

    /**
     * Set ingresoId
     *
     * @param string $ingresoId
     *
     * @return HojaEnfermeria
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

    /**
     * Set tensionArterialMin
     *
     * @param integer $tensionArterialMin
     *
     * @return HojaEnfermeria
     */
    public function setTensionArterialMin($tensionArterialMin)
    {
        $this->tensionArterialMin = $tensionArterialMin;

        return $this;
    }

    /**
     * Get tensionArterialMin
     *
     * @return integer
     */
    public function getTensionArterialMin()
    {
        return $this->tensionArterialMin;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return HojaEnfermeria
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
     * Set enfermero
     *
     * @param \BackendBundle\Entity\EnfermeroUser $enfermero
     *
     * @return HojaEnfermeria
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
}
