<?php

namespace MiroBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/miro")
     */
    public function indexAction()
    {
        return $this->render('MiroBundle:Default:index.html.twig');
    }
}
