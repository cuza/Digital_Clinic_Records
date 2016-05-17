<?php

namespace BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="admin-panel")
     */
    public function indexAction()
    {
        return $this->render('BackendBundle:Default:index.html.twig');
    }
}
