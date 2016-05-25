<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ingreso;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\HojaEnfermeria;
use AppBundle\Form\HojaEnfermeriaType;

/**
 * HojaEnfermeria controller.
 *
 * @Route("/hojaenfermeria")
 */
class HojaEnfermeriaController extends Controller
{
    /**
     * @Route("/new/{id}")
     * @Template()
     * @param Request $request
     * @param Ingreso $ingreso
     * @return array
     * @throws \InvalidArgumentException
     */
    public function newAction(Request $request, Ingreso $ingreso)
    {
        $em = $this->getDoctrine()->getManager();
//        if ($hoja == null) {
        $hoja = new HojaEnfermeria();
//        }
        $editForm = $this->createForm('AppBundle\Form\HojaEnfermeriaType', $hoja);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            /** @var User $user */
            $user = $this->getUser();
            $hoja->setDatetime(new \DateTime());
            if ($user->hasRole("ROLE_ENFERMERO"))
                $hoja->setEnfermero($user);
            $hoja->setIngreso($ingreso);

            $em = $this->getDoctrine()->getManager();
            $em->persist($hoja);
            $em->flush();

            return $this->redirectToRoute('app_ingreso_show', array('id' => $ingreso->getId()));
        }
        return array(

            'ingreso' => $ingreso,
            'form' => $editForm->createView()
        );
    }

    /**
     * Finds and displays a HojaEnfermeria entity.
     *
     * @Route("/{id}", name="hojaenfermeria_show")
     * @Method("GET")
     */
    public function showAction(HojaEnfermeria $hojaEnfermeria)
    {

        return $this->render('AppBundle:HojaEnfermeria:show.html.twig', array(
            'hojaEnfermeria' => $hojaEnfermeria,
        ));
    }

    /**
     * Displays a form to edit an existing HojaEnfermeria entity.
     *
     * @Route("/{id}/edit", name="hojaenfermeria_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, HojaEnfermeria $hojaEnfermeria)
    {
        $editForm = $this->createForm('AppBundle\Form\HojaEnfermeriaType', $hojaEnfermeria);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($hojaEnfermeria);
            $em->flush();

            return $this->redirectToRoute('hojaenfermeria_edit', array('id' => $hojaEnfermeria->getId()));
        }

        return $this->render('AppBundle:HojaEnfermeria:edit.html.twig', array(
            'hojaEnfermeria' => $hojaEnfermeria,
            'edit_form' => $editForm->createView(),
        ));
    }

}
