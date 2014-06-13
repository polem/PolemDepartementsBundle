<?php 

namespace Polem\DepartementsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\ChoiceList\ObjectChoiceList;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;

use Polem\DepartementsBundle\Form\DataTransformer\CodeToDepartementTransformer;

class DepartementType extends AbstractType
{
    protected $provider;

    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $provider = $this->provider;

        $choices = function (Options $options) use ($provider) {
            if (null === $options['region']) {
                $departements = $provider->findAllDepartements($options['sorted_by_name']);
                return new ObjectChoiceList($departements, null, $options['preferred_choices'], null, 'code', null);
            }

            $departements = $provider->findRegionByCode($options['region'])->getDepartements();
            return new ObjectChoiceList($departements, null, $options['preferred_choices'], null, 'code', null);
        };

        $resolver->setDefaults(array(
            'use_codes'      => false,
            'sorted_by_name' => true,
            'choice_list'    => $choices,
            'region'         => null
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if($options['use_codes']) {
            $transformer = new CodeToDepartementTransformer($this->provider);
            $builder->addModelTransformer($transformer);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'polem_departement';
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
