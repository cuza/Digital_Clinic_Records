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
}
