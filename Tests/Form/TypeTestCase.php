<?php

namespace Polem\DepartementsBundle\Tests\Form;

use Symfony\Component\Form\Tests\Extension\Core\Type\TypeTestCase as BaseTypeTestCase;

use Polem\DepartementsBundle\Tests\Form\Extension\TypeExtensionTest;

class TypeTestCase extends BaseTypeTestCase
{
    protected function getExtensions()
    {
        return array(
            new TypeExtensionTest($this->createRequestMock())
        );
    }

    protected function createRequestMock()
    {
        return $this->getMock('Symfony\Component\HttpFoundation\Request');
    }
}

