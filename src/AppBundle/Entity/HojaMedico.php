<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HojaMedico
 *
 * @ORM\Table(name="hoja_medico")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HojaMedicoRepository")
 */
class HojaMedico
{
    public function __toString(){
        return $this->getConsulta().''.$this->getIngreso();
    }
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
     * @ORM\Column(name="HistoriaEnfermedadActual", type="text")
     */
    private $historiaEnfermedadActual;

    /**
     * @var string
     *
     * @ORM\Column(name="ExamenFisico", type="text")
     */
    private $examenFisico;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Complementario", mappedBy="hojaMedico")
     */
    private $complemetarios;

    /**
     * @var string
     *
     * @ORM\Column(name="ImpresionDiagnostica", type="text")
     */
    private $impresionDiagnostica;

    /**
     * @var string
     *
     * @ORM\Column(name="EvolucionTratamiento", type="text")
     */
    private $evolucionTratamiento;

    /**
     * @var bool
     *
     * @ORM\Column(name="TratamientoAntibioticos", type="boolean", nullable=true)
     */
    private $tratamientoAntibioticos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime", nullable=true)
     */
    private $datetime;

    /**
     * @var DoctorUser
     *
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\DoctorUser", inversedBy="hojasMedico")
     * @ORM\JoinColumn(name="doctor_id", referencedColumnName="id")
     */
    private $doctor;

    /**
     * @var ResidenteUser
     *
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ResidenteUser", inversedBy="hojasMedico")
     * @ORM\JoinColumn(name="residente_id", referencedColumnName="id")
     */
    private $residente;

    /**
     * @var Ingreso
     *
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ingreso", inversedBy="hojasMedico")
     * @ORM\JoinColumn(name="ingreso_id", referencedColumnName="id")
     */
    private $ingreso;

    /**
     * @var Consulta
     *
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Consulta", inversedBy="hojasMedico")
     * @ORM\JoinColumn(name="consulta_id", referencedColumnName="id")
     */
    private $consulta;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->complemetarios = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set historiaEnfermedadActual
     *
     * @param string $historiaEnfermedadActual
     *
     * @return HojaMedico
     */
    public function setHistoriaEnfermedadActual($historiaEnfermedadActual)
    {
        $this->historiaEnfermedadActual = $historiaEnfermedadActual;

        return $this;
    }

    /**
     * Get historiaEnfermedadActual
     *
     * @return string
     */
    public function getHistoriaEnfermedadActual()
    {
        return $this->historiaEnfermedadActual;
    }

    /**
     * Set examenFisico
     *
     * @param string $examenFisico
     *
     * @return HojaMedico
     */
    public function setExamenFisico($examenFisico)
    {
        $this->examenFisico = $examenFisico;

        return $this;
    }

    /**
     * Get examenFisico
     *
     * @return string
     */
    public function getExamenFisico()
    {
        return $this->examenFisico;
    }

    /**
     * Set evolucionTratamiento
     *
     * @param string $evolucionTratamiento
     *
     * @return HojaMedico
     */
    public function setEvolucionTratamiento($evolucionTratamiento)
    {
        $this->evolucionTratamiento = $evolucionTratamiento;

        return $this;
    }

    /**
     * Get evolucionTratamiento
     *
     * @return string
     */
    public function getEvolucionTratamiento()
    {
        return $this->evolucionTratamiento;
    }

    /**
     * Set tratamientoAntibioticos
     *
     * @param boolean $tratamientoAntibioticos
     *
     * @return HojaMedico
     */
    public function setTratamientoAntibioticos($tratamientoAntibioticos)
    {
        $this->tratamientoAntibioticos = $tratamientoAntibioticos;

        return $this;
    }

    /**
     * Get tratamientoAntibioticos
     *
     * @return boolean
     */
    public function getTratamientoAntibioticos()
    {
        return $this->tratamientoAntibioticos;
    }

    /**
     * Add complemetario
     *
     * @param \AppBundle\Entity\Complementario $complemetario
     *
     * @return HojaMedico
     */
    public function addComplemetario(\AppBundle\Entity\Complementario $complemetario)
    {
        $this->complemetarios[] = $complemetario;

        return $this;
    }

    /**
     * Remove complemetario
     *
     * @param \AppBundle\Entity\Complementario $complemetario
     */
    public function removeComplemetario(\AppBundle\Entity\Complementario $complemetario)
    {
        $this->complemetarios->removeElement($complemetario);
    }

    /**
     * Get complemetarios
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComplemetarios()
    {
        return $this->complemetarios;
    }

    /**
     * Set doctor
     *
     * @param \AppBundle\Entity\DoctorUser $doctor
     *
     * @return HojaMedico
     */
    public function setDoctor(\AppBundle\Entity\DoctorUser $doctor = null)
    {
        $this->doctor = $doctor;

        return $this;
    }

    /**
     * Get doctor
     *
     * @return \AppBundle\Entity\DoctorUser
     */
    public function getDoctor()
    {
        return $this->doctor;
    }

    /**
     * Set residente
     *
     * @param \AppBundle\Entity\ResidenteUser $residente
     *
     * @return HojaMedico
     */
    public function setResidente(\AppBundle\Entity\ResidenteUser $residente = null)
    {
        $this->residente = $residente;

        return $this;
    }

    /**
     * Get residente
     *
     * @return \AppBundle\Entity\ResidenteUser
     */
    public function getResidente()
    {
        return $this->residente;
    }

    /**
     * Set ingreso
     *
     * @param \AppBundle\Entity\Ingreso $ingreso
     *
     * @return HojaMedico
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
     * Set consulta
     *
     * @param \AppBundle\Entity\Consulta $consulta
     *
     * @return HojaMedico
     */
    public function setConsultas(\AppBundle\Entity\Consulta $consulta = null)
    {
        $this->consulta = $consulta;

        return $this;
    }

    /**
     * Get consulta
     *
     * @return \AppBundle\Entity\Consulta
     */
    public function getConsulta()
    {
        return $this->consulta;
    }

    /**
     * Set impresionDiagnostica
     *
     * @param string $impresionDiagnostica
     *
     * @return HojaMedico
     */
    public function setImpresionDiagnostica($impresionDiagnostica)
    {
        $this->impresionDiagnostica = $impresionDiagnostica;

        return $this;
    }

    /**
     * Get impresionDiagnostica
     *
     * @return string
     */
    public function getImpresionDiagnostica()
    {
        return $this->impresionDiagnostica;
    }

    /**
     * Set consulta
     *
     * @param \AppBundle\Entity\Consulta $consulta
     *
     * @return HojaMedico
     */
    public function setConsulta(\AppBundle\Entity\Consulta $consulta = null)
    {
        $this->consulta = $consulta;

        return $this;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return HojaMedico
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
}
