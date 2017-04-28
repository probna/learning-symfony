<?php

namespace TwoESystems\AirlinesBundle\Controller;

use TwoESystems\AirlinesBundle\Entity\Country;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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

        $countries = $em->getRepository('TwoESystemsAirlinesBundle:Country')->findAll();

        return $this->render('country/index.html.twig', array(
            'countries' => $countries,
        ));
    }

    /**
     * Finds and displays a country entity.
     *
     * @Route("/{id}", name="country_show")
     * @Method("GET")
     */
    public function showAction(Country $country)
    {

        return $this->render('country/show.html.twig', array(
            'country' => $country,
        ));
    }
}
