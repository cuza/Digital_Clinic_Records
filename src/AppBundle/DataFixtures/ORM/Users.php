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

/**
 * Fixtures de la entidad User.
 * Crea usuarios de prueba con información muy realista.
 */
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
            ->setPlainPassword('pp')
            ->setEnabled(true);
        if (rand() % 2) {
            $entity->setNombre($this->getNombre('Masculino'));
            $entity->setSexo('Masculino');

        } else {
            $entity->setNombre($this->getNombre('Femenino'));
            $entity->setSexo('Femenino');
        }
        $manager->persist($entity);

        for ($i = 0; $i < 3; $i++) {
            $entity = new AdminUser();

            $entity->setUsername('admin #' . $i)
                ->setEmail("admin$i@mail.com")
                ->setPlainPassword('pp')
                ->setEnabled(true);
            if (rand() % 2) {
                $entity->setNombre($this->getNombre('Masculino'));
                $entity->setSexo('Masculino');

            } else {
                $entity->setNombre($this->getNombre('Femenino'));
                $entity->setSexo('Femenino');
            }

            $manager->persist($entity);
        }

        for ($i = 0; $i < 3; $i++) {
            $entity = new ResidenteUser();

            $entity->setUsername('residente #' . $i)
                ->setEmail("residente$i@mail.com")
                ->setPlainPassword('pp')
                ->setEnabled(true);
            if (rand() % 2) {
                $entity->setNombre($this->getNombre('Masculino'));
                $entity->setSexo('Masculino');

            } else {
                $entity->setNombre($this->getNombre('Femenino'));
                $entity->setSexo('Femenino');
            }

            $manager->persist($entity);
        }

        for ($i = 0; $i < 3; $i++) {
            $entity = new EstudianteUser();

            $entity->setUsername('estudiante #' . $i)
                ->setEmail("estudiante$i@mail.com")
                ->setPlainPassword('pp')
                ->setEnabled(true);
            if (rand() % 2) {
                $entity->setNombre($this->getNombre('Masculino'));
                $entity->setSexo('Masculino');

            } else {
                $entity->setNombre($this->getNombre('Femenino'));
                $entity->setSexo('Femenino');
            }

            $manager->persist($entity);
        }

        for ($i = 0; $i < 3; $i++) {
            $entity = new DoctorUser();

            $entity->setUsername('doctor #' . $i)
                ->setEmail("doctor$i@mail.com")
                ->setPlainPassword('pp')
                ->setEnabled(true);
            if (rand() % 2) {
                $entity->setNombre($this->getNombre('Masculino'));
                $entity->setSexo('Masculino');

            } else {
                $entity->setNombre($this->getNombre('Femenino'));
                $entity->setSexo('Femenino');
            }

            $manager->persist($entity);
        }

        for ($i = 0; $i < 3; $i++) {
            $entity = new LaboratorioUser();

            $entity->setUsername('laboratorista #' . $i)
                ->setEmail("laboratorista$i@mail.com")
                ->setPlainPassword('pp')
                ->setEnabled(true);
            if (rand() % 2) {
                $entity->setNombre($this->getNombre('Masculino'));
                $entity->setSexo('Masculino');

            } else {
                $entity->setNombre($this->getNombre('Femenino'));
                $entity->setSexo('Femenino');
            }

            $manager->persist($entity);
        }

        for ($i = 0; $i < 3; $i++) {
            $entity = new EnfermeroUser();

            $entity->setUsername('enfermero #' . $i)
                ->setEmail("enfermero$i@mail.com")
                ->setPlainPassword('pp')
                ->setEnabled(true);
            if (rand() % 2) {
                $entity->setNombre($this->getNombre('Masculino'));
                $entity->setSexo('Masculino');

            } else {
                $entity->setNombre($this->getNombre('Femenino'));
                $entity->setSexo('Femenino');
            }

            $manager->persist($entity);
        }

        $manager->flush();
    }


    /**
     * Generador aleatorio de nombres de personas.
     * Aproximadamente genera un 50% de hombres y un 50% de mujeres.
     *
     * @return string Nombre aleatorio generado para el usuario.
     */
    private function getNombre($gender)
    {

        $hombres = array(
            'Antonio', 'José', 'Manuel', 'Francisco', 'Juan', 'David',
            'José Antonio', 'José Luis', 'Jesús', 'Javier', 'Francisco Javier',
            'Carlos', 'Daniel', 'Miguel', 'Rafael', 'Pedro', 'José Manuel',
            'Ángel', 'Alejandro', 'Miguel Ángel', 'Andy', 'Fernando',
            'Luis', 'Sergio', 'Pablo', 'Jorge', 'Alberto'
        );
        $mujeres = array(
            'María Carmen', 'María', 'Carmen', 'Josefa', 'Isabel', 'Ana María',
            'María Dolores', 'María Pilar', 'María Teresa', 'Ana', 'Francisca',
            'Laura', 'Antonia', 'Dolores', 'María Angeles', 'Cristina', 'Marta',
            'Claudia', 'María Isabel', 'Pilar', 'María Luisa', 'Concepción',
            'Lucía', 'Mercedes', 'Manuela', 'Elena', 'Rosa María'
        );

        if ($gender == 'Masculino') {
            return $hombres[array_rand($hombres)] . ' ' . $this->getApellidos();
        } else {
            return $mujeres[array_rand($mujeres)] . ' ' . $this->getApellidos();
        }
    }

    /**
     * Generador aleatorio de apellidos de personas.
     *
     * @return string Apellido aleatorio generado para el usuario.
     */
    private function getApellidos()
    {


        $apellidos = array(
            'Cuza', 'del Pino', 'García', 'González', 'Rodríguez', 'Fernández',
            'Sánchez', 'Pérez', 'Gómez', 'Martín', 'Jiménez', 'Ruiz',
            'Hernández', 'Díaz', 'Moreno', 'Álvarez', 'Muñoz', 'Romero',
            'Alonso', 'Gutiérrez', 'Navarro', 'Torres', 'Domínguez', 'Vázquez',
            'Ramos', 'Gil', 'Ramírez', 'Serrano', 'Blanco', 'Suárez', 'Molina',
            'Morales', 'Ortega', 'Delgado', 'Castro', 'Ortíz', 'Rubio', 'Marín',
            'Sanz', 'Iglesias', 'Nuñez', 'Medina', 'Garrido', 'López', 'Martínez'
        );

        return $apellidos[array_rand($apellidos)] . ' ' . $apellidos[array_rand($apellidos)];
    }


}
