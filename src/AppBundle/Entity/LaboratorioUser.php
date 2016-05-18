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
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LaboratorioUserRepository")
 * @ORM\Table(name="LaboratorioUser")
 * 
 * @UniqueEntity(fields = "username", targetClass = "AppBundle\Entity\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "AppBundle\Entity\User", message="fos_user.email.already_used")
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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Complementario", mappedBy="laboratorista")
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return LaboratorioUser
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
     * @return LaboratorioUser
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
     * @return LaboratorioUser
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
     * Add complementario
     *
     * @param \AppBundle\Entity\Complementario $complementario
     *
     * @return LaboratorioUser
     */
    public function addComplementario(\AppBundle\Entity\Complementario $complementario)
    {
        $this->complementarios[] = $complementario;

        return $this;
    }

    /**
     * Remove complementario
     *
     * @param \AppBundle\Entity\Complementario $complementario
     */
    public function removeComplementario(\AppBundle\Entity\Complementario $complementario)
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
