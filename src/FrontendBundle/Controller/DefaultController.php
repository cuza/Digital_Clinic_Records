<?php

namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $discriminator = $this->container->get('pugx_user.manager.user_discriminator');
        $discriminator->setClass('BackendBundle\Entity\AdminUser');

        $userManager = $this->container->get('pugx_user_manager');

        $userOne = $userManager->createUser();

        $userOne->setUsername('qp');
        $userOne->setEmail('qp@mail.com');
        $userOne->setPlainPassword('123456');
        $userOne->setEnabled(true);

        $userManager->updateUser($userOne, true);
        return $this->render('FrontendBundle:Default:index.html.twig');
    }
}
