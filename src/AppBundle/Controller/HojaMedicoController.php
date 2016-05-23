<?php

namespace AppBundle\Controller;


use AppBundle\Entity\HojaMedico;
use AppBundle\Entity\User;
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
     * @Route("/fetch/{id}")
     * @Template()
     * @param Request $request
     * @return array
     * @throws \InvalidArgumentException
     */
    public function fetchAction(Request $request, Paciente $paciente)
    {
        $em = $this->getDoctrine()->getManager();
//        $id = $request->query->get('hid');
//        $hoja = null;
//        if (is_numeric($id))
//            $hoja = $em->getRepository("AppBundle:HojaMedico")->findOneBy(array('id' => $id));
//        if ($hoja == null) {
        $hoja = new HojaMedico();
//        }
        $editForm = $this->createForm('AppBundle\Form\HojaMedicoType', $hoja);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            /** @var User $user */
            $user = $this->getUser();
            $hoja->setDatetime(new \DateTime());
            if ($user->hasRole("ROLE_DOCTOR"))
                $hoja->setDoctor($user);
            else if ($user->hasRole("ROLE_RESIDENTE"))
                $hoja->setResidente($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($hoja);
            $em->flush();

            return $this->redirectToRoute('hoja_medico_show', array('id' => $hoja->getId(), 'pid' => $paciente->getId()));
        }
        return array(

            'paciente' => $paciente,
            'edit_form' => $editForm->createView()
        );
    }

    /**
     * Finds and displays a Paciente entity.
     *
     * @Route("/{id}", name="hoja_medico_show")
     * @Template()
     * @Method("GET")
     * @param Request $request
     * @param HojaMedico $hoja
     * @return array
     * @throws \InvalidArgumentException
     */
    public function showAction(Request $request, HojaMedico $hoja)
    {
        $em = $this->getDoctrine()->getManager();
        $pid = $request->query->get('pid');
        $paciente = $em->getRepository("AppBundle:Paciente")->findOneBy(array('id' => $pid));
        return array(
            'hoja' => $hoja,
            'paciente' => $paciente
        );
    }
}
