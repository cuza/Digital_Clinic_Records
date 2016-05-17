<?php
/**
 * Created by PhpStorm.
 * User: dave
 * Date: 19/4/16
 * Time: 8:04 PM
 */

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\DoctorUserRepository")
 * @ORM\Table(name="DoctorUser")
 *
 * @UniqueEntity(fields = "username", targetClass = "BackendBundle\Entity\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "BackendBundle\Entity\User", message="fos_user.email.already_used")
 */
class DoctorUser extends User
{
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
}
