<?php
/**
 * Created by PhpStorm.
 * User: dave
 * Date: 18/5/16
 * Time: 7:40 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Complementario;
use AppBundle\Entity\HojaMedico;
use AppBundle\Entity\Ingreso;
use AppBundle\Entity\Paciente;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * Complementario controller.
 *
 * @Route("/complementario")
 */
class ComplementarioController extends Controller
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
        $complementario = new Complementario();
//        }
        $editForm = $this->createForm('AppBundle\Form\ComplementarioType', $complementario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            /** @var User $user */
            $complementario->setHojaMedico($hoja);
            $complementario->setDatetime(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($hoja);
            $em->persist($complementario);
            $em->flush();

            return $this->redirectToRoute('hoja_medico_show', array('id' => $hoja->getId(), 'pid' => $paciente->getId()));
        }
        return array(
            'hoja' => $hoja,
            'paciente' => $paciente,
            'complementario' => $complementario,
            'edit_form' => $editForm->createView()
        );
    }


    /**
     * Change and displays a Ingreso entity.
     * @Security("has_role('ROLE_LABORATORIO')")
     * @Route("/result/{id}")
     * @Template()
     * @param Request $request
     * @param Ingreso $complementario
     * @return array
     * @throws \InvalidArgumentException
     */
    public function resultAction(Request $request, Complementario $complementario)
    {
        $form = $this->createForm('AppBundle\Form\ComplementarioEndType', $complementario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($complementario);
            $em->flush();

            return $this->redirectToRoute('app_complementario_show', array('id' => $complementario->getId()));
        }

        return array(
            'ingreso' => $complementario,
            'form' => $form->createView()
        );
    }

    /**
     * Finds and displays a Ingreso entity.
     *
     * @Route("/{id}")
     * @Template()
     * @Method("GET")
     * @param Complementario $complementario
     * @return array
     */
    public function showAction(Complementario $complementario)
    {
        return array(
            'complementario' => $complementario
        );
    }

    /**
     * Finds and displays all complementarios entity.
     * @Security("has_role('ROLE_LABORATORIO')")
     * @Route("/")
     * @Template()
     * @Method("GET")
     * @return array
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $complementario = $em->getRepository('AppBundle:Complementario')->findAll();

        return array(
            'complementarios' => $complementario
        );
    }

}