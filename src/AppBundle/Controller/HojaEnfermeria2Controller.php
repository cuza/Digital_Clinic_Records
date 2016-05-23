<?php

namespace AppBundle\Controller;

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
     * Lists all HojaEnfermeria2 entities.
     *
     * @Route("/", name="hojaenfermeria2_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $hojaEnfermeria2s = $em->getRepository('AppBundle:HojaEnfermeria2')->findAll();

        return $this->render('AppBundle:HojaEnfermeria2:index.html.twig', array(
            'hojaEnfermeria2s' => $hojaEnfermeria2s,
        ));
    }

    /**
     * Creates a new HojaEnfermeria2 entity.
     *
     * @Route("/new", name="hojaenfermeria2_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $hojaEnfermeria2 = new HojaEnfermeria2();
        $form = $this->createForm('AppBundle\Form\HojaEnfermeria2Type', $hojaEnfermeria2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $hojaEnfermeria2->setDate(new \DateTime());
            $em->persist($hojaEnfermeria2);
            $em->flush();

            return $this->redirectToRoute('hojaenfermeria2_show', array('id' => $hojaEnfermeria2->getId()));
        }

        return $this->render('AppBundle:HojaEnfermeria2:new.html.twig', array(
            'hojaEnfermeria2' => $hojaEnfermeria2,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a HojaEnfermeria2 entity.
     *
     * @Route("/{id}", name="hojaenfermeria2_show")
     * @Method("GET")
     */
    public function showAction(HojaEnfermeria2 $hojaEnfermeria2)
    {
        $deleteForm = $this->createDeleteForm($hojaEnfermeria2);

        return $this->render('AppBundle:HojaEnfermeria2:show.html.twig', array(
            'hojaEnfermeria2' => $hojaEnfermeria2,
            'delete_form' => $deleteForm->createView(),
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
        $deleteForm = $this->createDeleteForm($hojaEnfermeria2);
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
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a HojaEnfermeria2 entity.
     *
     * @Route("/{id}", name="hojaenfermeria2_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, HojaEnfermeria2 $hojaEnfermeria2)
    {
        $form = $this->createDeleteForm($hojaEnfermeria2);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($hojaEnfermeria2);
            $em->flush();
        }

        return $this->redirectToRoute('hojaenfermeria2_index');
    }

    /**
     * Creates a form to delete a HojaEnfermeria2 entity.
     *
     * @param HojaEnfermeria2 $hojaEnfermeria2 The HojaEnfermeria2 entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(HojaEnfermeria2 $hojaEnfermeria2)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('hojaenfermeria2_delete', array('id' => $hojaEnfermeria2->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
