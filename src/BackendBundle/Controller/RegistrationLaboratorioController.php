<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 5/16/2016
 * Time: 10:33 PM
 */

namespace BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RegistrationLaboratorioController extends Controller
{
    /**
     * @Route("/register/laboratorio", name="laboratorio-registration")
     */
    public function registerAction()
    {
        return $this->container
            ->get('pugx_multi_user.registration_manager')
            ->register('BackendBundle\Entity\LaboratorioUser');
    }
}