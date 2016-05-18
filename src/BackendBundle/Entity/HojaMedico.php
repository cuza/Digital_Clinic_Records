<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HojaMedico
 *
 * @ORM\Table(name="hoja_medico")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\HojaMedicoRepository")
 */
class HojaMedico
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
     * @ORM\Column(name="HistoriaEnfermedadActual", type="text", nullable=true)
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
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\Complementario", mappedBy="paciente")
     */
    private $complemetarios;

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
     * Get id
     *
     * @return int
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
     * Set complementarios
     *
     * @param string $complementarios
     *
     * @return HojaMedico
     */
    public function setComplementarios($complementarios)
    {
        $this->complementarios = $complementarios;

        return $this;
    }

    /**
     * Get complementarios
     *
     * @return string
     */
    public function getComplementarios()
    {
        return $this->complementarios;
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
     * @return bool
     */
    public function getTratamientoAntibioticos()
    {
        return $this->tratamientoAntibioticos;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->complemetarios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add complemetario
     *
     * @param \BackendBundle\Entity\Complementario $complemetario
     *
     * @return HojaMedico
     */
    public function addComplemetario(\BackendBundle\Entity\Complementario $complemetario)
    {
        $this->complemetarios[] = $complemetario;
    
        return $this;
    }

    /**
     * Remove complemetario
     *
     * @param \BackendBundle\Entity\Complementario $complemetario
     */
    public function removeComplemetario(\BackendBundle\Entity\Complementario $complemetario)
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
}
