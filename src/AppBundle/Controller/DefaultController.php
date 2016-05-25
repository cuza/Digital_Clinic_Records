<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class DefaultController extends Controller
{
    /**
     * @Security("has_role('ROLE_USER')")
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }

    /**
     * @Security("has_role('ROLE_USER')")
     * @Template()
     * @Route("/search")
     */
    public function searchAction()
    {
        $em=$this->getDoctrine()->getManager();
        $pacientes = $em->getRepository('AppBundle:Paciente')->findAll();
        return array(
            'pacientes'=>$pacientes
        );
    }
}
