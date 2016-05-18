<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\AdminUser;
use AppBundle\Entity\DoctorUser;
use AppBundle\Entity\EstudianteUser;
use AppBundle\Entity\ResidenteUser;
use AppBundle\Entity\LaboratorioUser;
use AppBundle\Entity\EnfermeroUser;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Users extends AbstractFixture implements OrderedFixtureInterface,
    ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 0;
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $entity = new AdminUser();

        $entity->setUsername('admin')
            ->setEmail("admin@gmail.com")
            ->setNombre("Pepe Gonzalez")
            ->setPlainPassword('pp')
            ->setEnabled(true);

        $manager->persist($entity);

        for ($i = 0; $i < 3; $i++) {
            $entity = new AdminUser();

            $entity->setUsername('admin #'.$i)
                ->setEmail("admin$i@mail.com")
                ->setPlainPassword('pp')
                ->setEnabled(true);

            $manager->persist($entity);
        }

        for ($i = 0; $i < 3; $i++) {
            $entity = new ResidenteUser();

            $entity->setUsername('residente #'.$i)
                ->setEmail("residente$i@mail.com")
                ->setPlainPassword('pp')
                ->setEnabled(true);

            $manager->persist($entity);
        }

        for ($i = 0; $i < 3; $i++) {
            $entity = new EstudianteUser();

            $entity->setUsername('estudiante #'.$i)
                ->setEmail("estudiante$i@mail.com")
                ->setPlainPassword('pp')
                ->setEnabled(true);

            $manager->persist($entity);
        }

        for ($i = 0; $i < 3; $i++) {
            $entity = new DoctorUser();

            $entity->setUsername('doctor #'.$i)
                ->setEmail("doctor$i@mail.com")
                ->setPlainPassword('pp')
                ->setEnabled(true);

            $manager->persist($entity);
        }

        for ($i = 0; $i < 3; $i++) {
            $entity = new LaboratorioUser();

            $entity->setUsername('laboratorista #'.$i)
                ->setEmail("laboratorista$i@mail.com")
                ->setPlainPassword('pp')
                ->setEnabled(true);

            $manager->persist($entity);
        }

        for ($i = 0; $i < 3; $i++) {
            $entity = new EnfermeroUser();

            $entity->setUsername('enfermero #'.$i)
                ->setEmail("enfermero$i@mail.com")
                ->setPlainPassword('pp')
                ->setEnabled(true);

            $manager->persist($entity);
        }

        $manager->flush();
    }
}
