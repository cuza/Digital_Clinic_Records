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
 * @ORM\Entity
 * @ORM\Table(name="EstudianteUser")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\EstudianteUserRepository")
 * @UniqueEntity(fields = "username", targetClass = "BackendBundle\Entity\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "BackendBundle\Entity\User", message="fos_user.email.already_used")
 */
class EstudianteUser extends User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @var int
     *
     * @ORM\Column(name="ano", type="integer")
     */
    private $ano;



    /**
     * Set ano
     *
     * @param integer $ano
     *
     * @return EstudianteUser
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
}
