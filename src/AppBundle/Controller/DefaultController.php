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
            ->orWhere("p.cId LIKE :q")
            ->orWhere("p.nombre LIKE :q")
            ->orWhere("p.primerApellido LIKE :q")
            ->orWhere("p.segundoApellido LIKE :q")
            ->orWhere("CONCAT(CONCAT(CONCAT(p.nombre,' '),CONCAT(p.primerApellido,' ')),CONCAT(p.segundoApellido,' ')) LIKE :q")
            ->setParameter('q', '%'.$q.'%')
        ->getQuery()->getResult();
        dump($pacientes);
        return array(
            'pacientes' => $pacientes
        );
    }
}
