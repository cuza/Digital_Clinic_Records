<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @ORM\InheritanceType("JOINED")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\UserRepository")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"admin" = "AdminUser","doctor" = "DoctorUser","estudiante" = "EstudianteUser","enfermero" = "EnfermeroUser","laboratorio" = "LaboratorioUser","residente" = "ResidenteUser"})
 *
 */
abstract class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer", name="id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Nombre")
     */
    protected $nombre;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", unique=true, nullable=true, name="c_id")
     */
    protected $cId;

    /**
     * @var string
     *
     * @ORM\Column(name="Sexo", type="string", nullable=true, length=255)
     */
    protected $sexo;


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
     * @return User
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
     * Set cId
     *
     * @param integer $cId
     *
     * @return User
     */
    public function setCId($cId)
    {
        $this->cId = $cId;

        return $this;
    }

    /**
     * Get cId
     *
     * @return int
     */
    public function getCId()
    {
        return $this->cId;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     *
     * @return User
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
}
