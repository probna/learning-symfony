<?php

namespace Aviation\AirlinesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller {
    /**
     * Show all airports
     *
     * @Route("/")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $airports = $em->getRepository('AviationAirlinesBundle:Airport')->findAll();

        return $this->render('AviationAirlinesBundle:Default:index.html.twig', array(
            'airports' => $airports,
        ));
    }
}
