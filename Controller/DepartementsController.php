<?php

namespace Polem\DepartementsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

use Departements\Provider;

class DepartementsController extends Controller
{
    protected $departementsProvider;

    /**
     * __construct
     *
     * @param Provider $departementsProvider
     */
    function __construct(Provider $departementsProvider)
    {
        $this->departementsProvider = $departementsProvider;
    }

    /**
     * listDepartements
     *
     * @param Request $request
     */
    public function listDepartementsAction(Request $request)
    {
        $departementsArray = array();

        // if request query contain region parameter get departement regions
        if($request->query->get('region')) {
            $region = $this->departementsProvider->findRegionByCode($request->query->get('region'));
        }

        $departements = isset($region) && $region ? $region->getDepartements() : $this->departementsProvider->findAllDepartements();

        foreach($departements as $departement) {
            $departementsArray[] = array(
                'code' => $departement->getCode(),
                'name' => $departement->getName()
            );
        }

        return new Response(json_encode($departementsArray));
    }
}

