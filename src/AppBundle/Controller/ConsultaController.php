<?php
/**
 * Created by PhpStorm.
 * User: dave
 * Date: 18/5/16
 * Time: 7:40 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Consulta;
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
     */
    public function newAction()
    {
        return array(// ...
        );
    }
}