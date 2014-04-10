<?php
namespace Polem\DepartementsBundle\Tests;

use Polem\DepartementsBundle\PolemDepartementsBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class PolemDepartementsBundleTest extends \Phpunit_Framework_TestCase
{
    public function testSubClassOfBundle()
    {
        $rc = new \ReflectionClass('Polem\DepartementsBundle\PolemDepartementsBundle');

        $this->assertTrue($rc->isSubclassOf('Symfony\Component\HttpKernel\Bundle\Bundle'));
    }

    public function testCouldBeConstructedWithoutAnyArguments()
    {
        new PolemDepartementsBundle;
    }

    public function testAddLoadersCompilerPassOnBuild()
    {
        $containerMock = $this->createContainerBuilderMock();
        $containerMock
            ->expects($this->atLeastOnce())
            ->method('getExtension')
            ->with('polem_departements')
            ->will($this->returnValue($this->createExtensionMock()))
        ;

        $bundle = new PolemDepartementsBundle;

        $bundle->build($containerMock);
    }

    protected function createExtensionMock()
    {
        $methods = array(
            'getNamespace', 'addResolverFactory', 'addLoaderFactory'
        );

        return $this->getMock('Polem\DepartementsBundle\DependencyInjection\PolemDepartementsExtension', $methods, array(), '', false);
    }

    protected function createContainerBuilderMock()
    {
        return $this->getMock('Symfony\Component\DependencyInjection\ContainerBuilder', array(), array(), '', false);
    }

}

