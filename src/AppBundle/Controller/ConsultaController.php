<?php
/**
 * Created by PhpStorm.
 * User: dave
 * Date: 18/5/16
 * Time: 7:40 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Consulta;
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
            $cid=$request->query->get('paciente')['cId'];
        $paciente=null;
        if (is_numeric($cid))
            $paciente = $em->getRepository("AppBundle:Paciente")->findOneBy(array('cId'=>$cid));
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

        if($form->isSubmitted() || is_numeric($cid)) {
            return array(
                'paciente' => $paciente,
                'form' => $form->createView(),
            );
        }

        return array(
            'form' => null,
        );
    }
}