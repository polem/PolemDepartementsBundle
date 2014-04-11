<?php

namespace Polem\DepartementsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\ChoiceList\ObjectChoiceList;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegionType extends AbstractType
{
    protected $provider;

    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $provider = $this->provider;

        $choices = function (Options $options) use($provider) {
            $regions = $provider->findAllRegions();
            return new ObjectChoiceList($regions, null, $options['preferred_choices'], null, 'code', null);
        };

        $resolver->setDefaults(array(
            'choice_list' => $choices
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
