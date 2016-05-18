<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HojaEnfermeria
 *
 * @ORM\Table(name="hoja_enfermeria")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HojaEnfermeriaRepository")
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\EnfermeroUser", inversedBy="hojasEnfermeria1")
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
     * @var Ingreso
     *
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ingreso", inversedBy="hojasEnfermeria1")
     * @ORM\JoinColumn(name="ingreso_id", referencedColumnName="id")
     */
    private $ingreso;


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
     * @return integer
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
     * @return integer
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
     * @return integer
     */
    public function getRespiracion()
    {
        return $this->respiracion;
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
     * @return integer
     */
    public function getTensionArterialMax()
    {
        return $this->tensionArterialMax;
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
     * @param \AppBundle\Entity\EnfermeroUser $enfermero
     *
     * @return HojaEnfermeria
     */
    public function setEnfermero(\AppBundle\Entity\EnfermeroUser $enfermero = null)
    {
        $this->enfermero = $enfermero;

        return $this;
    }

    /**
     * Get enfermero
     *
     * @return \AppBundle\Entity\EnfermeroUser
     */
    public function getEnfermero()
    {
        return $this->enfermero;
    }

    /**
     * Set ingreso
     *
     * @param \AppBundle\Entity\Ingreso $ingreso
     *
     * @return HojaEnfermeria
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
}
