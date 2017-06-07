<?php

namespace MiroBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
