<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bridge\Doctrine\PropertyInfo\Tests;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Symfony\Bridge\Doctrine\PropertyInfo\DoctrineExtractor;
use Symfony\Component\PropertyInfo\Type;

/**
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class DoctrineExtractorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DoctrineExtractor
     */
    private $extractor;

    public function setUp()
    {
        $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__.DIRECTORY_SEPARATOR.'Fixtures'), true);
        $entityManager = EntityManager::create(array('driver' => 'pdo_sqlite'), $config);

        $this->extractor = new DoctrineExtractor($entityManager->getMetadataFactory());
    }

    public function testGetProperties()
    {
        $this->assertEquals(
             array(
                'id',
                'guid',
                'time',
                'json',
                'simpleArray',
                'bool',
                'binary',
                'foo',
                'bar',
            ),
            $this->extractor->getProperties('Symfony\Bridge\Doctrine\Tests\PropertyInfo\Fixtures\DoctrineDummy')
        );
    }

    /**
     * @dataProvider typesProvider
     */
    public function testExtract($property, array $type = null)
    {
        $this->assertEquals($type, $this->extractor->getTypes('Symfony\Bridge\Doctrine\Tests\PropertyInfo\Fixtures\DoctrineDummy', $property, array()));
    }

    public function typesProvider()
    {
        return array(
            array('id', array(new Type(Type::BUILTIN_TYPE_INT))),
            array('guid', array(new Type(Type::BUILTIN_TYPE_STRING))),
            array('bool', array(new Type(Type::BUILTIN_TYPE_BOOL))),
            array('binary', array(new Type(Type::BUILTIN_TYPE_RESOURCE))),
            array('json', array(new Type(Type::BUILTIN_TYPE_ARRAY, false, null, true))),
            array('foo', array(new Type(Type::BUILTIN_TYPE_OBJECT, false, 'Symfony\Bridge\Doctrine\Tests\PropertyInfo\Fixtures\DoctrineRelation'))),
            array('bar', array(new Type(
                Type::BUILTIN_TYPE_OBJECT,
                false,
                'Doctrine\Common\Collections\Collection',
                true,
                new Type(Type::BUILTIN_TYPE_INT),
                new Type(Type::BUILTIN_TYPE_OBJECT, false, 'Symfony\Bridge\Doctrine\Tests\PropertyInfo\Fixtures\DoctrineRelation')
            ))),
            array('simpleArray', array(new Type(Type::BUILTIN_TYPE_ARRAY, false, null, true, new Type(Type::BUILTIN_TYPE_INT), new Type(Type::BUILTIN_TYPE_STRING)))),
            array('notMapped', null),
        );
    }
}
