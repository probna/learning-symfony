<?php

namespace Aviation\AirlinesBundle\Controller;

use Aviation\AirlinesBundle\Entity\Country;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Country controller.
 *
 * @Route("country")
 */
class CountryController extends Controller
{
    /**
     * Lists all country entities.
     *
     * @Route("/", name="country_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $countries = $em->getRepository('AviationAirlinesBundle:Country')->findAll();

        return $this->render('AviationAirlinesBundle:country:index.html.twig', [
            'countries' => $countries,
        ]);
    }

    /**
     * Finds and displays a country entity.
     *
     * @Route("/{id}", name="country_show")
     * @Method("GET")
     */
    public function showAction(Country $country)
    {
        return $this->render('AviationAirlinesBundle:country:show.html.twig', [
            'country' => $country,
        ]);
    }
}
