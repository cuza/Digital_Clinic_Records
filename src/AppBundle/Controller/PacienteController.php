<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Paciente;
use AppBundle\Form\PacienteType;

/**
 * Paciente controller.
 *
 * @Route("/paciente")
 */
class PacienteController extends Controller
{
    /**
     * @Route("/fetch")
     * @Template()
     * @param Request $request
     * @return array
     * @throws \InvalidArgumentException
     */
    public function fetchAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $id = $request->request->get('id');
        $paciente=null;
        if ($id)
            $paciente = $em->getRepository("AppBundle:Paciente")->find($id);
        if ($paciente == null)
            $paciente = new Paciente();
        $editForm = $this->createForm('AppBundle\Form\PacienteType', $paciente);

        return array(
            'paciente' => $paciente,
            'edit_form' => $editForm->createView()
        );
    }

    /**
     * @Route("/post")
     * @Template()
     */
    public function postAction()
    {
        return array(// ...
        );
    }

    /**
     * Finds and displays a Paciente entity.
     *
     * @Route("/{id}", name="paciente_show")
     * @Template()
     * @Method("GET")
     * @param Paciente $paciente
     * @return array
     */
    public function showAction(Paciente $paciente)
    {
        return array(
            'paciente' => $paciente
        );
    }

}