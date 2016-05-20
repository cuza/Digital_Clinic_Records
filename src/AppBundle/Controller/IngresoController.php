<?php
/**
 * Created by PhpStorm.
 * User: dave
 * Date: 18/5/16
 * Time: 7:40 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Consulta;
use AppBundle\Entity\HojaMedico;
use AppBundle\Entity\Ingreso;
use AppBundle\Entity\Paciente;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * Ingreso controller.
 *
 * @Route("/ingreso")
 */
class IngresoController extends Controller
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
        $hid = $request->query->get('hid');
        $hoja = $em->getRepository("AppBundle:HojaMedico")->findOneBy(array('id' => $hid));
        $pid = $request->query->get('pid');
        $paciente = $em->getRepository("AppBundle:Paciente")->findOneBy(array('id' => $pid));

//        $iid = $request->query->get('iid');
//        $ingreso = null;
//        if (is_numeric($iid))
//            $ingreso = $em->getRepository("AppBundle:Ingreso")->findOneBy(array('id' => $iid));
//        if ($ingreso == null) {
            $ingreso = new Ingreso();
//        }
        $editForm = $this->createForm('AppBundle\Form\IngresoType', $ingreso);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            /** @var User $user */
            $ingreso->setPaciente($paciente);
            $hoja->setIngreso($ingreso);

            $em = $this->getDoctrine()->getManager();
            $em->persist($hoja);
            $em->persist($ingreso);
            $em->flush();

            return $this->redirectToRoute('app_ingreso_show', array('id' => $ingreso->getId()));
        }
        return array(
            'hoja' => $hoja,
            'paciente' => $paciente,
            'ingreso' => $ingreso,
            'edit_form' => $editForm->createView()
        );
    }


    /**
     * Finds and displays a Ingreso entity.
     *
     * @Route("/{id}")
     * @Template()
     * @Method("GET")
     * @param Ingreso $ingreso
     * @return array
     */
    public function showAction(Ingreso $ingreso)
    {
        return array(
            'ingreso' => $ingreso
        );
    }
}