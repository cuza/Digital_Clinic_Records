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
use AppBundle\Entity\Paciente;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * Consulta controller.
 *
 * @Route("/consulta")
 */
class ConsultaController extends Controller
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

//        $cid = $request->query->get('cid');
//        $consulta = null;
//        if (is_numeric($cid))
//            $consulta = $em->getRepository("AppBundle:Consulta")->findOneBy(array('id' => $cid));
//        if ($consulta == null) {
            $consulta = new Consulta();
//        }
        $editForm = $this->createForm('AppBundle\Form\ConsultaType', $consulta);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            /** @var User $user */
            $consulta->setPaciente($paciente);
            $consulta->setFecha(new \DateTime());
            $hoja->setConsultas($consulta);

            $em = $this->getDoctrine()->getManager();
            $em->persist($hoja);
            $em->persist($consulta);
            $em->flush();

            return $this->redirectToRoute('app_consulta_show', array('id' => $consulta->getId()));
        }
        return array(
            'hoja' => $hoja,
            'paciente' => $paciente,
            'consulta' => $consulta,
            'edit_form' => $editForm->createView()
        );
    }


    /**
     * @Route("/new")
     * @Template()
     * @param Request $request
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \InvalidArgumentException
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $cid = $request->request->get('paciente')['cId'];
        if (!is_numeric($cid))
            $cid = $request->query->get('paciente')['cId'];
        $paciente = null;
        if (is_numeric($cid))
            $paciente = $em->getRepository("AppBundle:Paciente")->findOneBy(array('cId' => $cid));
        if ($paciente == null) {
            $paciente = new Paciente();
            if (is_numeric($cid))
                $paciente->setCId($cid);
        }
        $form = $this->createForm('AppBundle\Form\PacienteType', $paciente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($paciente);
            $em->flush();

            return $this->redirectToRoute('app_hojamedico_fetch', array('id' => $paciente->getId()));
        }

        if ($form->isSubmitted() || is_numeric($cid)) {
            return array(
                'paciente' => $paciente,
                'form' => $form->createView(),
            );
        }

        return array(
            'form' => null,
        );
    }

    /**
     * Finds and displays a Consulta entity.
     *
     * @Route("/{id}")
     * @Template()
     * @Method("GET")
     * @param Consulta $consulta
     * @return array
     */
    public function showAction(Consulta $consulta)
    {
        return array(
            'consulta' => $consulta
        );
    }
}