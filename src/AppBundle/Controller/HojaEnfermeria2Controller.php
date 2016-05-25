<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ingreso;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\HojaEnfermeria2;
use AppBundle\Form\HojaEnfermeria2Type;

/**
 * HojaEnfermeria2 controller.
 *
 * @Route("/hojaenfermeria2")
 */
class HojaEnfermeria2Controller extends Controller
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
        $hoja = new HojaEnfermeria2();
//        }
        $editForm = $this->createForm('AppBundle\Form\HojaEnfermeria2Type', $hoja);
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
     * Finds and displays a HojaEnfermeria2 entity.
     *
     * @Route("/{id}", name="hojaenfermeria2_show")
     * @Method("GET")
     */
    public function showAction(HojaEnfermeria2 $hojaEnfermeria2)
    {

        return $this->render('AppBundle:HojaEnfermeria2:show.html.twig', array(
            'hojaEnfermeria2' => $hojaEnfermeria2,
        ));
    }

    /**
     * Displays a form to edit an existing HojaEnfermeria2 entity.
     *
     * @Route("/{id}/edit", name="hojaenfermeria2_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, HojaEnfermeria2 $hojaEnfermeria2)
    {
        $editForm = $this->createForm('AppBundle\Form\HojaEnfermeria2Type', $hojaEnfermeria2);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($hojaEnfermeria2);
            $em->flush();

            return $this->redirectToRoute('hojaenfermeria2_edit', array('id' => $hojaEnfermeria2->getId()));
        }

        return $this->render('AppBundle:HojaEnfermeria2:edit.html.twig', array(
            'hojaEnfermeria2' => $hojaEnfermeria2,
            'edit_form' => $editForm->createView(),
        ));
    }

}
