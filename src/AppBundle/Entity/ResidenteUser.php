<?php
/**
 * Created by PhpStorm.
 * User: dave
 * Date: 19/4/16
 * Time: 8:04 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ResidenteUserRepository")
 * @ORM\Table(name="ResidenteUser")
 * 
 * @UniqueEntity(fields = "username", targetClass = "AppBundle\Entity\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "AppBundle\Entity\User", message="fos_user.email.already_used")
 */
class ResidenteUser extends User
{
    public function __construct()
    {
        parent::__construct();
        $this->roles=array("ROLE_RESIDENTE");
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true, name="Especialidad")
     */
    private $especialidad;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true, name="ano")
     */
    private $ano;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", unique=true, nullable=true, name="doctor_id")
     */
    private $doctorId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\HojaMedico", mappedBy="residente")
     */
    private $hojasMedico;

    /**
     * Set especialidad
     *
     * @param string $especialidad
     *
     * @return ResidenteUser
     */
    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;

        return $this;
    }


    /**
     * Get especialidad
     *
     * @return string
     */
    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    /**
     * Set ano
     *
     * @param integer $ano
     *
     * @return ResidenteUser
     */
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Get ano
     *
     * @return integer
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * Set doctorId
     *
     * @param integer $doctorId
     *
     * @return ResidenteUser
     */
    public function setDoctorId($doctorId)
    {
        $this->doctorId = $doctorId;

        return $this;
    }

    /**
     * Get doctorId
     *
     * @return integer
     */
    public function getDoctorId()
    {
        return $this->doctorId;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return ResidenteUser
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
     * @return ResidenteUser
     */
    public function setCId($cId)
    {
        $this->cId = $cId;

        return $this;
    }

    /**
     * Get cId
     *
     * @return integer
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
     * @return ResidenteUser
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
     * Add hojasMedico
     *
     * @param \AppBundle\Entity\HojaMedico $hojasMedico
     *
     * @return ResidenteUser
     */
    public function addHojasMedico(\AppBundle\Entity\HojaMedico $hojasMedico)
    {
        $this->hojasMedico[] = $hojasMedico;

        return $this;
    }

    /**
     * Remove hojasMedico
     *
     * @param \AppBundle\Entity\HojaMedico $hojasMedico
     */
    public function removeHojasMedico(\AppBundle\Entity\HojaMedico $hojasMedico)
    {
        $this->hojasMedico->removeElement($hojasMedico);
    }

    /**
     * Get hojasMedico
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHojasMedico()
    {
        return $this->hojasMedico;
    }
}
