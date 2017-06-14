<?php

namespace Aviation\CountryBundle\Controller;

use Aviation\CountryBundle\Entity\Country;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Country controller.
 *
 * @Route("country")
 */
class DefaultController extends Controller
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

        $countries = $em->getRepository('AviationCountryBundle:Country')->findAll();

        return $this->render('AviationCountryBundle:Default:index.html.twig', [
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
        return $this->render('AviationCountryBundle:Default:show.html.twig', [
            'country' => $country,
        ]);
    }
}
