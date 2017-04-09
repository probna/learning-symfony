<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number/{max}", requirements={"max": "\d*"})
     * @param $max
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function numberAction($max = 50)
    {
        $number = mt_rand(0, $max);

        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
        ));
    }
}
