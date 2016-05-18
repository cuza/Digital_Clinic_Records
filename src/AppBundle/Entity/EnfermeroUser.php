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
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EnfermeroUserRepository")
 * @ORM\Table(name="EnfermeroUser")
 * 
 * @UniqueEntity(fields = "username", targetClass = "AppBundle\Entity\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "AppBundle\Entity\User", message="fos_user.email.already_used")
 */
class EnfermeroUser extends User
{
    public function __construct()
    {
        parent::__construct();
        $this->roles=array("ROLE_ENFERMERO");
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", nullable=true, name="licenciatura")
     */
    private $licenciatura;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\HojaEnfermeria", mappedBy="enfermero")
     */
    private $hojasEnfermeria1;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\HojaEnfermeria2", mappedBy="enfermero")
     */
    private $hojasEnfermeria2;


    /**
     * Set licenciatura
     *
     * @param boolean $licenciatura
     *
     * @return EnfermeroUser
     */
    public function setLicenciatura($licenciatura)
    {
        $this->licenciatura = $licenciatura;

        return $this;
    }

    /**
     * Get licenciatura
     *
     * @return boolean
     */
    public function getLicenciatura()
    {
        return $this->licenciatura;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return EnfermeroUser
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
     * @return EnfermeroUser
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
     * @return EnfermeroUser
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
     * Add hojasEnfermeria1
     *
     * @param \AppBundle\Entity\HojaEnfermeria $hojasEnfermeria1
     *
     * @return EnfermeroUser
     */
    public function addHojasEnfermeria1(\AppBundle\Entity\HojaEnfermeria $hojasEnfermeria1)
    {
        $this->hojasEnfermeria1[] = $hojasEnfermeria1;

        return $this;
    }

    /**
     * Remove hojasEnfermeria1
     *
     * @param \AppBundle\Entity\HojaEnfermeria $hojasEnfermeria1
     */
    public function removeHojasEnfermeria1(\AppBundle\Entity\HojaEnfermeria $hojasEnfermeria1)
    {
        $this->hojasEnfermeria1->removeElement($hojasEnfermeria1);
    }

    /**
     * Get hojasEnfermeria1
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHojasEnfermeria1()
    {
        return $this->hojasEnfermeria1;
    }

    /**
     * Add hojasEnfermeria2
     *
     * @param \AppBundle\Entity\HojaEnfermeria2 $hojasEnfermeria2
     *
     * @return EnfermeroUser
     */
    public function addHojasEnfermeria2(\AppBundle\Entity\HojaEnfermeria2 $hojasEnfermeria2)
    {
        $this->hojasEnfermeria2[] = $hojasEnfermeria2;

        return $this;
    }

    /**
     * Remove hojasEnfermeria2
     *
     * @param \AppBundle\Entity\HojaEnfermeria2 $hojasEnfermeria2
     */
    public function removeHojasEnfermeria2(\AppBundle\Entity\HojaEnfermeria2 $hojasEnfermeria2)
    {
        $this->hojasEnfermeria2->removeElement($hojasEnfermeria2);
    }

    /**
     * Get hojasEnfermeria2
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHojasEnfermeria2()
    {
        return $this->hojasEnfermeria2;
    }
}
