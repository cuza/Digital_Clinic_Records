<?php
//
///*
// * (c) Javier Eguiluz <javier.eguiluz@gmail.com>
// *
// * Este archivo pertenece a la aplicación de prueba Cupon.
// * El código fuente de la aplicación incluye un archivo llamado LICENSE
// * con toda la información sobre el copyright y la licencia.
// */
//
//namespace AppBundle\DataFixtures\ORM;
//
//use Doctrine\Common\DataFixtures\AbstractFixture;
//use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
//use Doctrine\Common\Persistence\ObjectManager;
//use Symfony\Component\DependencyInjection\ContainerAwareInterface;
//use Symfony\Component\DependencyInjection\ContainerInterface;
//use AppBundle\Entity\Paciente;
//
///**
// * Fixtures de la entidad Paciente.
// * Crea pacientes de prueba con información muy realista.
// */
//class Pacientes extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
//{
//    public function getOrder()
//    {
//        return -40;
//    }
//
//    private $container;
//
//    public function setContainer(ContainerInterface $container = null)
//    {
//        $this->container = $container;
//    }
//
//    public function load(ObjectManager $manager)
//    {
//
//        for ($i = 1; $i <= 500; $i++) {
//            $paciente = new Paciente();
//            if (rand() % 2) {
//                $paciente->setNombre($this->getNombre('Masculino'));
//                $paciente->setSexo('Masculino');
//
//            } else {
//                $paciente->setNombre($this->getNombre('Femenino'));
//                $paciente->setSexo('Femenino');
//            }
//            $paciente->setPrimerApellido($this->getApellidos());
//            $paciente->setSegundoApellido($this->getApellidos());
//
//
//
//            $paciente->setDireccion($this->getDireccion($this->getCiudad()));
//
//            $paciente->setFechaNacimiento(new \DateTime('now - ' . rand(7000, 20000) . ' days'));
//
//            $dni = substr(rand(), 0, 8);
//            $paciente->setDni($dni . substr("TRWAGMYFPDXBNJZSQVHLCKE", strtr($dni, "XYZ", "012") % 23, 1));
//
//            $paciente->setNumeroTarjeta('1234567890123456');
//
//            $manager->persist($paciente);
//        }
//
//        $manager->flush();
//    }
//
//    /**
//     * Generador aleatorio de nombres de personas.
//     * Aproximadamente genera un 50% de hombres y un 50% de mujeres.
//     *
//     * @return string Nombre aleatorio generado para el usuario.
//     */
//    private function getNombre()
//    {
//        // Los nombres más populares en España según el INE
//        // Fuente: http://www.ine.es/daco/daco42/nombyapel/nombyapel.htm
//
//        $hombres = array(
//            'Antonio', 'José', 'Manuel', 'Francisco', 'Juan', 'David',
//            'José Antonio', 'José Luis', 'Jesús', 'Javier', 'Francisco Javier',
//            'Carlos', 'Daniel', 'Miguel', 'Rafael', 'Pedro', 'José Manuel',
//            'Ángel', 'Alejandro', 'Miguel Ángel', 'José María', 'Fernando',
//            'Luis', 'Sergio', 'Pablo', 'Jorge', 'Alberto'
//        );
//        $mujeres = array(
//            'María Carmen', 'María', 'Carmen', 'Josefa', 'Isabel', 'Ana María',
//            'María Dolores', 'María Pilar', 'María Teresa', 'Ana', 'Francisca',
//            'Laura', 'Antonia', 'Dolores', 'María Angeles', 'Cristina', 'Marta',
//            'María José', 'María Isabel', 'Pilar', 'María Luisa', 'Concepción',
//            'Lucía', 'Mercedes', 'Manuela', 'Elena', 'Rosa María'
//        );
//
//        if (rand() % 2) {
//            return $hombres[array_rand($hombres)];
//        } else {
//            return $mujeres[array_rand($mujeres)];
//        }
//    }
//
//    /**
//     * Generador aleatorio de apellidos de personas.
//     *
//     * @return string Apellido aleatorio generado para el usuario.
//     */
//    private function getApellidos()
//    {
//        // Los apellidos más populares en España según el INE
//        // Fuente: http://www.ine.es/daco/daco42/nombyapel/nombyapel.htm
//
//        $apellidos = array(
//            'García', 'González', 'Rodríguez', 'Fernández', 'López', 'Martínez',
//            'Sánchez', 'Pérez', 'Gómez', 'Martín', 'Jiménez', 'Ruiz',
//            'Hernández', 'Díaz', 'Moreno', 'Álvarez', 'Muñoz', 'Romero',
//            'Alonso', 'Gutiérrez', 'Navarro', 'Torres', 'Domínguez', 'Vázquez',
//            'Ramos', 'Gil', 'Ramírez', 'Serrano', 'Blanco', 'Suárez', 'Molina',
//            'Morales', 'Ortega', 'Delgado', 'Castro', 'Ortíz', 'Rubio', 'Marín',
//            'Sanz', 'Iglesias', 'Nuñez', 'Medina', 'Garrido'
//        );
//
//        return $apellidos[array_rand($apellidos)];
//    }
//
//    /**
//     * Generador aleatorio de direcciones postales.
//     *
//     * @param  Ciudad $ciudad Objeto de la ciudad para la que se genera una dirección postal.
//     * @return string         Dirección postal aleatoria generada para la tienda.
//     */
//    private function getDireccion($ciudad)
//    {
//        $prefijos = array('Calle', 'Avenida');
//        $nombres = array(
//            'Lorem', 'Ipsum', 'Sitamet', 'Consectetur', 'Adipiscing',
//            'Necsapien', 'Tincidunt', 'Facilisis', 'Nulla', 'Scelerisque',
//            'Blandit', 'Ligula', 'Eget', 'Hendrerit', 'Malesuada', 'Enimsit'
//        );
//
//        return $prefijos[array_rand($prefijos)] . ' ' . $nombres[array_rand($nombres)] . ', ' . rand(1, 100) . "\n"
//        . $this->getCodigoPostal() . ' ' . $ciudad;
//    }
//
//    private function getCiudad()
//    {
//        $ciudades = array(
//            'Madrid',
//            'Barcelona',
//            'Valencia',
//            'Sevilla',
//            'Zaragoza',
//            'Málaga',
//            'Murcia',
//            'Palma de Mallorca',
//            'Las Palmas de Gran Canaria',
//            'Bilbao',
//            'Alicante',
//            'Córdoba',
//            'Valladolid',
//            'Vigo',
//            'Gijón',
//            'Hospitalet de Llobregat',
//            'La Coruña',
//            'Granada',
//            'Vitoria-Gasteiz',
//            'Elche',
//            'Oviedo',
//            'Santa Cruz de Tenerife',
//            'Badalona',
//            'Cartagena',
//            'Tarrasa',
//        );
//        return $ciudades[array_rand($ciudades)];
//    }
//
//    /**
//     * Generador aleatorio de códigos postales
//     *
//     * @return string Código postal aleatorio generado para la tienda.
//     */
//    private function getCodigoPostal()
//    {
//        return sprintf('%02s%03s', rand(1, 52), rand(0, 999));
//    }
//}
