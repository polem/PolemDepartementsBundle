<?php 

namespace Polem\DepartementsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DepartementType extends AbstractType
{
    protected $provider;

    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $departements = $this->provider->findAllDepartements();

        $choices = array();

        foreach($departements as $departement) {
            $choices[$departement->getCode()] = sprintf('%d - %s', $departement->getCode(), $departement->getName());
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
