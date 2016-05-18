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
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DoctorUserRepository")
 * @ORM\Table(name="DoctorUser")
 *
 * @UniqueEntity(fields = "username", targetClass = "AppBundle\Entity\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "AppBundle\Entity\User", message="fos_user.email.already_used")
 */
class DoctorUser extends User
{
    public function __construct()
    {
        parent::__construct();
        $this->roles=array("ROLE_DOCTOR");
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
     * @ORM\Column(type="integer", unique=true, nullable=true, name="doctor_id")
     */
    private $doctorId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\HojaMedico", mappedBy="doctor")
     */
    private $hojasMedico;


    /**
     * Set especialidad
     *
     * @param string $especialidad
     *
     * @return DoctorUser
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
     * Set doctorId
     *
     * @param integer $doctorId
     *
     * @return DoctorUser
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
     * @return DoctorUser
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
     * @return DoctorUser
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
     * @return DoctorUser
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
     * @return DoctorUser
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
