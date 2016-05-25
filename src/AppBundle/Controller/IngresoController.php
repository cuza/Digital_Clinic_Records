<?php
/**
 * Created by PhpStorm.
 * User: dave
 * Date: 18/5/16
 * Time: 7:40 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Complementario;
use AppBundle\Entity\Consulta;
use AppBundle\Entity\HojaEnfermeria;
use AppBundle\Entity\HojaEnfermeria2;
use AppBundle\Entity\HojaMedico;
use AppBundle\Entity\Ingreso;
use AppBundle\Entity\IngresoSala;
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
            $ingreso->setFechaIngreso(new \DateTime());


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
     * Change and displays a Ingreso entity.
     *
     * @Route("/change/{id}")
     * @Template()
     * @param Request $request
     * @param Ingreso $ingreso
     * @return array
     * @throws \InvalidArgumentException
     */
    public function changeAction(Request $request, Ingreso $ingreso)
    {
        $form = $this->createForm('AppBundle\Form\IngresoChangeType', $ingreso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ingreso);
            $em->flush();

            return $this->redirectToRoute('app_ingreso_show', array('id' => $ingreso->getId()));
        }

        return array(
            'ingreso' => $ingreso,
            'form' => $form->createView()
        );
    }

    /**
     * Change and displays a Ingreso entity.
     *
     * @Route("/leave/{id}")
     * @Template()
     * @param Request $request
     * @param Ingreso $ingreso
     * @return array
     * @throws \InvalidArgumentException
     */
    public function leaveAction(Request $request, Ingreso $ingreso)
    {
        $form = $this->createForm('AppBundle\Form\IngresoEndType', $ingreso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ingreso->setFechaSalida(new \DateTime());
            $salas = $ingreso->getSalas();
            /** @var IngresoSala $sa */
            $sa = $salas[count($salas) - 1];
            $sa->setFechaSalida(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($ingreso);
            $em->flush();

            return $this->redirectToRoute('app_ingreso_show', array('id' => $ingreso->getId()));
        }

        return array(
            'ingreso' => $ingreso,
            'form' => $form->createView()
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
        $hm = $ingreso->getHojasMedico();
        $he1 = $ingreso->getHojasEnfermeria1();
        $he2 = $ingreso->getHojasEnfermeria2();
        $cmp = array();
        /** @var HojaMedico $var */
        foreach ($hm as $var) {
            $cs = $var->getComplemetarios();
            foreach ($cs as $c) {
                $cmp[] = $c;
            }
        }

        $tl = array();
        foreach ($hm as $x) {
            $tl[] = $x;
        }
        foreach ($he1 as $x) {
            $tl[] = $x;
        }
        foreach ($he2 as $x) {
            $tl[] = $x;
        }
        foreach ($cmp as $x) {
            $tl[] = $x;
        }
        usort($tl, "AppBundle\\Controller\\IngresoController::cmp");
        $tl = array_reverse($tl);
        return array(
            'timeline' => $tl,
            'ingreso' => $ingreso
        );
    }

    /**
     * Finds and displays a Ingreso entity.
     *
     * @Route("/")
     * @Template()
     * @Method("GET")
     * @return array
     */
    public function indexAction()
    {
        $salas = array();
        $em = $this->getDoctrine()->getManager();
        $ingresos = $em->getRepository('AppBundle:Ingreso')->findBy(array('fechaSalida'=> null));

        /** @var Ingreso $i */
        foreach ($ingresos as $i) {
            if($i->getSala()) {
                if (!array_key_exists($i->getSala()->getId(),$salas)) {
                    $salas[$i->getSala()->getId()] = array('sala' => $i->getSala(), 'ingresos' => array());
                }
                $salas[$i->getSala()->getId()]['ingresos'][] = $i;
            }
        }
dump($salas);
        return array(
            'salas' => $salas
        );
    }


    public static function cmp($a, $b)
    {
        $da = IngresoController::gDate($a);
        $db = IngresoController::gDate($b);
        if ($da == $db) {
            return 0;
        }
        return ($da < $db) ? -1 : 1;
    }

    /**
     * @param mixed $e
     * @return \DateTime
     */
    public static function gDate($e)
    {
        switch (get_class($e)) {
            case "AppBundle\\Entity\\HojaEnfermeria":
            case "AppBundle\\Entity\\Complementario":
            case "AppBundle\\Entity\\HojaMedico":
                return $e->getDatetime();
            case "AppBundle\\Entity\\HojaEnfermeria2":
                return $e->getDate();
            case "AppBundle\\Entity\\Consulta":
                return $e->getFecha();
            case "AppBundle\\Entity\\Ingreso":
                return $e->getFechaIngreso();
        }
    }
}
