<?php

namespace Polem\DepartementsBundle\Twig;

use Departements\Provider;

class DepartementsExtension extends \Twig_Extension
{
    protected $departementsProvider;

    public function __construct(Provider $departementsProvider)
    {
        $this->departementsProvider = $departementsProvider;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('departement', array($this, 'departementFilter')),
            new \Twig_SimpleFilter('region', array($this, 'regionFilter')),
        );
    }

    public function departementFilter($code)
    {
        $departement = $this->departementsProvider->findDepartementByCode($code);

        if($departement) {
            return $departement->getName();
        }

        return $code;
    }

    public function regionFilter($code)
    {
        $region = $this->departementsProvider->findRegionByCode($code);

        if($region) {
            return $region->getName();
        }

        return $code;
    }

    public function getName()
    {
        return 'departements_extension';
    }
}
