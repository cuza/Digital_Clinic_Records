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
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\LaboratorioUserRepository")
 * @ORM\Table(name="LaboratorioUser")
 * 
 * @UniqueEntity(fields = "username", targetClass = "BackendBundle\Entity\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "BackendBundle\Entity\User", message="fos_user.email.already_used")
 */
class LaboratorioUser extends User
{
    public function __construct()
    {
        parent::__construct();
        $this->roles=array("ROLE_LABORATORIO");
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\Complementario", mappedBy="laboratorista")
     */
    private $complementarios;


    /**
     * Set especialidad
     *
     * @param string $especialidad
     *
     * @return LaboratorioUser
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
     * @return LaboratorioUser
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
     * @return LaboratorioUser
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
     * Add complementario
     *
     * @param \BackendBundle\Entity\Complementario $complementario
     *
     * @return LaboratorioUser
     */
    public function addComplementario(\BackendBundle\Entity\Complementario $complementario)
    {
        $this->complementarios[] = $complementario;

        return $this;
    }

    /**
     * Remove complementario
     *
     * @param \BackendBundle\Entity\Complementario $complementario
     */
    public function removeComplementario(\BackendBundle\Entity\Complementario $complementario)
    {
        $this->complementarios->removeElement($complementario);
    }

    /**
     * Get complementarios
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComplementarios()
    {
        return $this->complementarios;
    }
}
