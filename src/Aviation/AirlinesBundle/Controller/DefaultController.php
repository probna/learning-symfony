<?php

namespace Aviation\AirlinesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller {
    /**
     * Shows a form for selecting departure and destination airports
     *
     * @Route("/")
     */
    public function indexAction()
    {

       $airlines = $this->get('aviation.airlines.service.sexy_airlines.top5')->getAirlinesByCountry(1);

        return $this->render('AviationAirlinesBundle:Default:index.html.twig', array(
            'airlines' => $airlines,
        ));
    }
}
