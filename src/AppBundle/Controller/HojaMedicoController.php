<?php

namespace AppBundle\Controller;


use AppBundle\Entity\HojaMedico;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Paciente;
use AppBundle\Form\PacienteType;

/**
 * HojaMedico controller.
 *
 * @Route("/hoja_medico")
 */
class HojaMedicoController extends Controller
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
        $cid = $request->request->get('id');
        $hoja=null;
        if (is_numeric($cid))
            $hoja = $em->getRepository("AppBundle:Paciente")->findOneBy(array('cId'=>$cid));
        if ($hoja == null) {
            $hoja = new HojaMedico();
        }
        $editForm = $this->createForm('AppBundle\Form\HojaMedicoType', $hoja);

        return array(
            'hoja' => $hoja,
            'edit_form' => $editForm->createView()
        );
    }

    /**
     * Finds and displays a Paciente entity.
     *
     * @Route("/{id}", name="hoja_medico_show")
     * @Template()
     * @Method("GET")
     * @param HojaMedico $hoja
     * @return array
     */
    public function showAction(HojaMedico $hoja)
    {
        return array(
            'hoja' => $hoja
        );
    }
}
