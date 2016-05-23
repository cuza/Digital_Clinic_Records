<?php

namespace AppBundle\Controller;

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
     * Lists all HojaEnfermeria entities.
     *
     * @Route("/", name="hojaenfermeria_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $hojaEnfermerias = $em->getRepository('AppBundle:HojaEnfermeria')->findAll();

        return $this->render('AppBundle:HojaEnfermeria:index.html.twig', array(
            'hojaEnfermerias' => $hojaEnfermerias,
        ));
    }

    /**
     * Creates a new HojaEnfermeria entity.
     *
     * @Route("/new", name="hojaenfermeria_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $hojaEnfermeria = new HojaEnfermeria();
        $form = $this->createForm('AppBundle\Form\HojaEnfermeriaType', $hojaEnfermeria);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $hojaEnfermeria->setDatetime(new \DateTime());
            $em->persist($hojaEnfermeria);
            $em->flush();

            return $this->redirectToRoute('hojaenfermeria_show', array('id' => $hojaEnfermeria->getId()));
        }

        return $this->render('AppBundle:HojaEnfermeria:new.html.twig', array(
            'hojaEnfermeria' => $hojaEnfermeria,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a HojaEnfermeria entity.
     *
     * @Route("/{id}", name="hojaenfermeria_show")
     * @Method("GET")
     */
    public function showAction(HojaEnfermeria $hojaEnfermeria)
    {
        $deleteForm = $this->createDeleteForm($hojaEnfermeria);

        return $this->render('AppBundle:HojaEnfermeria:show.html.twig', array(
            'hojaEnfermeria' => $hojaEnfermeria,
            'delete_form' => $deleteForm->createView(),
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
        $deleteForm = $this->createDeleteForm($hojaEnfermeria);
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
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a HojaEnfermeria entity.
     *
     * @Route("/{id}", name="hojaenfermeria_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, HojaEnfermeria $hojaEnfermeria)
    {
        $form = $this->createDeleteForm($hojaEnfermeria);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($hojaEnfermeria);
            $em->flush();
        }

        return $this->redirectToRoute('hojaenfermeria_index');
    }

    /**
     * Creates a form to delete a HojaEnfermeria entity.
     *
     * @param HojaEnfermeria $hojaEnfermeria The HojaEnfermeria entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(HojaEnfermeria $hojaEnfermeria)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('hojaenfermeria_delete', array('id' => $hojaEnfermeria->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
