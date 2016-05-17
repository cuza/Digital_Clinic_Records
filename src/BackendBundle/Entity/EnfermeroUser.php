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
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\EnfermeroUserRepository")
 * @ORM\Table(name="EnfermeroUser")
 * 
 * @UniqueEntity(fields = "username", targetClass = "BackendBundle\Entity\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "BackendBundle\Entity\User", message="fos_user.email.already_used")
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\HojaEnfermeria", mappedBy="enfermero")
     */
    private $hojasEnfermeria1;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\HojaEnfermeria2", mappedBy="enfermero")
     */
    private $hojasEnfermeria2;


    /**
     * Add datos1
     *
     * @param \BackendBundle\Entity\HojaEnfermeria $datos1
     *
     * @return EnfermeroUser
     */
    public function addDatos1(\BackendBundle\Entity\HojaEnfermeria $datos1)
    {
        $this->datos1[] = $datos1;

        return $this;
    }

    /**
     * Remove datos1
     *
     * @param \BackendBundle\Entity\HojaEnfermeria $datos1
     */
    public function removeDatos1(\BackendBundle\Entity\HojaEnfermeria $datos1)
    {
        $this->datos1->removeElement($datos1);
    }

    /**
     * Get datos1
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDatos1()
    {
        return $this->datos1;
    }

    /**
     * Add datos2
     *
     * @param \BackendBundle\Entity\HojaEnfermeria2 $datos2
     *
     * @return EnfermeroUser
     */
    public function addDatos2(\BackendBundle\Entity\HojaEnfermeria2 $datos2)
    {
        $this->datos2[] = $datos2;

        return $this;
    }

    /**
     * Remove datos2
     *
     * @param \BackendBundle\Entity\HojaEnfermeria2 $datos2
     */
    public function removeDatos2(\BackendBundle\Entity\HojaEnfermeria2 $datos2)
    {
        $this->datos2->removeElement($datos2);
    }

    /**
     * Get datos2
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDatos2()
    {
        return $this->datos2;
    }
}
