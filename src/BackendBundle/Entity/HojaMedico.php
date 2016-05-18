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
     * @var string
     *
     * @ORM\Column(name="Complementarios", type="string", length=255)
     */
    private $complementarios;

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
}

