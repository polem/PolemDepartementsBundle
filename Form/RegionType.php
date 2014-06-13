<?php

namespace Polem\DepartementsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\ChoiceList\ObjectChoiceList;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;

use Polem\DepartementsBundle\Form\DataTransformer\CodeToRegionTransformer;

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
            $regions = $provider->findAllRegions($options['sorted_by_name']);
            return new ObjectChoiceList($regions, null, $options['preferred_choices'], null, 'code', null);
        };

        $resolver->setDefaults(array(
            'use_codes'      => false,
            'choice_list'    => $choices,
            'sorted_by_name' => true
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if($options['use_codes']) {
            $transformer = new CodeToRegionTransformer($this->provider);
            $builder->addModelTransformer($transformer);
        }
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
