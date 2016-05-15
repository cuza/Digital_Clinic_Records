<?php

namespace BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use BackendBundle\Entity\Sexo;
use BackendBundle\Form\SexoType;

/**
 * Sexo controller.
 *
 * @Route("/sexo")
 */
class SexoController extends Controller
{
    /**
     * Lists all Sexo entities.
     *
     * @Route("/", name="sexo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sexos = $em->getRepository('BackendBundle:Sexo')->findAll();

        return $this->render('sexo/index.html.twig', array(
            'sexos' => $sexos,
        ));
    }

    /**
     * Creates a new Sexo entity.
     *
     * @Route("/new", name="sexo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sexo = new Sexo();
        $form = $this->createForm('BackendBundle\Form\SexoType', $sexo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sexo);
            $em->flush();

            return $this->redirectToRoute('sexo_show', array('id' => $sexo->getId()));
        }

        return $this->render('sexo/new.html.twig', array(
            'sexo' => $sexo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Sexo entity.
     *
     * @Route("/{id}", name="sexo_show")
     * @Method("GET")
     */
    public function showAction(Sexo $sexo)
    {
        $deleteForm = $this->createDeleteForm($sexo);

        return $this->render('sexo/show.html.twig', array(
            'sexo' => $sexo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Sexo entity.
     *
     * @Route("/{id}/edit", name="sexo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Sexo $sexo)
    {
        $deleteForm = $this->createDeleteForm($sexo);
        $editForm = $this->createForm('BackendBundle\Form\SexoType', $sexo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sexo);
            $em->flush();

            return $this->redirectToRoute('sexo_edit', array('id' => $sexo->getId()));
        }

        return $this->render('sexo/edit.html.twig', array(
            'sexo' => $sexo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Sexo entity.
     *
     * @Route("/{id}", name="sexo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Sexo $sexo)
    {
        $form = $this->createDeleteForm($sexo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sexo);
            $em->flush();
        }

        return $this->redirectToRoute('sexo_index');
    }

    /**
     * Creates a form to delete a Sexo entity.
     *
     * @param Sexo $sexo The Sexo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sexo $sexo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sexo_delete', array('id' => $sexo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
