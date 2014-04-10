<?php

namespace Polem\DepartementsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegionType extends AbstractType
{
    protected $provider;

    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $regions = $this->provider->findAllRegions();

        $choices = array();

        foreach($regions as $region) {
            $choices[$region->getCode()] = sprintf('%d - %s', $region->getCode(), $region->getName());
        }

        $resolver->setDefaults(array(
            'choices' => $choices
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'polem_region';
    }

    public function getParent()
    {
        return 'choice';
    }

    public function setProvider($provider)
    {
        $this->provider = $provider;

        return $this;
    }
}
