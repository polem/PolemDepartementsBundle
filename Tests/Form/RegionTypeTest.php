<?php

namespace Polem\DepartementsBundle\Tests\Form;

use Departements\Region;

class RegionTypeTest
{
    public function test()
    {
        $map = new \PhpCollection\Map();

        $region = new Region();
        $region->setCode(23);
        $region->setName('Region 1');

        $map->set(23, $region);

        $provider = $this->getMockBuilder('Departements\Provider')
            ->disableOriginalConstructor()
            ->getMock();

        $provider->expects($this->atLeastOnce())
            ->method('findAllRegions')
            ->will($this->returnValue($map));

        $type = new DepartementType();
        $type->setProvider($provider);

        $form = $this->factory->create($type);


        $view = $form->createView();
    }
}
