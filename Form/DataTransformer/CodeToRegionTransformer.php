<?php

namespace Polem\DepartementsBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Departements\Provider;

class CodeToRegionTransformer implements DataTransformerInterface
{
    /**
     * __construct
     *
     * @param Provider $provider
     */
    public function __construct(Provider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * {@inheritDoc}
     */
    public function transform($input)
    {
        return $this->provider->findRegionByCode($input);
    }

    /**
     * {@inheritDoc}
     */
    public function reverseTransform($input)
    {
        if (null === $input) {
            return "";
        }

        return $input->getCode();
    }
}
