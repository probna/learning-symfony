<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number/")
     * @Route("/lucky/number/{max}", requirements={"max": "\d*"})
     *
     * @param $max
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function numberAction($max = 50)
    {
        //        var_dump($max);
//        die();
        $number = mt_rand(0, $max);

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }
}
