<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sala
 *
 * @ORM\Table(name="Sala")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SalaRepository")
 */
class Sala
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Servicio", type="string", length=255)
     */
    private $servicio;

    /**
     * @var string
     *
     * @ORM\Column(name="Sexo", type="string", nullable=true, length=255)
     */
    private $sexo;

    /**
     * @var Sala
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\IngresoSala", mappedBy="sala")
     */
    private $ingresos;



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
     * @return Sala
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
     * Set servicio
     *
     * @param string $servicio
     *
     * @return Sala
     */
    public function setServicio($servicio)
    {
        $this->servicio = $servicio;

        return $this;
    }

    /**
     * Get servicio
     *
     * @return string
     */
    public function getServicio()
    {
        return $this->servicio;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     *
     * @return Sala
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set ingresos
     *
     * @param \AppBundle\Entity\IngresoSala $ingresos
     *
     * @return Sala
     */
    public function setIngresos(\AppBundle\Entity\IngresoSala $ingresos = null)
    {
        $this->ingresos = $ingresos;

        return $this;
    }

    /**
     * Get ingresos
     *
     * @return \AppBundle\Entity\IngresoSala
     */
    public function getIngresos()
    {
        return $this->ingresos;
    }
}
