<?php

namespace Polem\DepartementsBundle\Tests\Form;

use Departements\Model\Departement;
use Polem\DepartementsBundle\Form\DepartementType;

class DepartementTypeTest
{
    public function test()
    {
        $map = new \PhpCollection\Map();

        $departement = new Departement();
        $departement->setCode(12);
        $departement->setName('Department 1');

        $map->set(12, $departement);

        $provider = $this->getMockBuilder('Departements\Provider')
            ->disableOriginalConstructor()
            ->getMock();

        $provider->expects($this->atLeastOnce())
            ->method('findAllDepartements')
            ->will($this->returnValue($map));

        $type = new DepartementType();
        $type->setProvider($provider);

        $form = $this->factory->create($type);


        $view = $form->createView();
    }
}

