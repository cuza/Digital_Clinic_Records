<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HojaEnfermeria2
 *
 * @ORM\Table(name="hoja_enfermeria2")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HojaEnfermeria2Repository")
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\EnfermeroUser", inversedBy="hojasEnfermeria2")
     * @ORM\JoinColumn(name="enfermero_id", referencedColumnName="id")
     */
    private $enfermero;

    /**
     * @var int
     * @ORM\Column(name="liquido", type="decimal", scale=2)
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
     * @ORM\Column(name="orina", type="decimal", scale=2)
     */
    private $orina;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", unique=true)
     */
    private $date;

    /**
     * @var Ingreso
     *
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ingreso", inversedBy="hojasEnfermeria2")
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
     * @param \AppBundle\Entity\EnfermeroUser $enfermero
     *
     * @return HojaEnfermeria2
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
     * @return HojaEnfermeria2
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
