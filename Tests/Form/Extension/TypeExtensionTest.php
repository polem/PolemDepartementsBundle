<?php

namespace Polem\DepartementsBundle\Tests\Form\Extension;

use Symfony\Component\Form\Extension\Core\CoreExtension;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Symfony\Component\HttpFoundation\Request;

use Polem\DepartementsBundle\Form\RegionType;
use Polem\DepartementsBundle\Form\DepartementType;

class TypeExtensionTest extends CoreExtension
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    protected function loadTypes()
    {
        return array_merge(parent::loadTypes(), array(
            new RegionType(array()),
            new DepartementType(array()),
        ));
    }
}

