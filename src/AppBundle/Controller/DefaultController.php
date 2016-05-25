<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/buscar")
     * @param Request $request
     * @return array
     * @throws \InvalidArgumentException
     */
    public function searchAction(Request $request)
    {
        $q=$request->query->get('q');
        $em = $this->getDoctrine()->getManager();
        $pacientes = $em->getRepository('AppBundle:Paciente')
            ->createQueryBuilder('p')
            ->orWhere("p.cId = :q")
            ->orWhere("p.nombre = :q")
            ->orWhere("p.primerApellido = :q")
            ->orWhere("p.segundoApellido = :q")
            ->setParameter('q', $q)
        ->getQuery()->getResult();
        dump($pacientes);
        return array(
            'pacientes' => $pacientes
        );
    }
}
