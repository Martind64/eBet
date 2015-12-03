<?php

namespace AppBundle\Controller;

use AppBundle\Controller\ControllerBase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Bet;

class IndexController extends ControllerBase
{
    /**
     * @Route("/index", name="index")
     * @Template()
     */
    public function showMatchesAction()
    {
        $betRepo = $this->getEM()->getRepository('AppBundle:Bet');
        $dotaBets = $betRepo->findDota2Matches();
        $csgoBets = $betRepo->findCsGoMatches();


        return [
            'dotaBets' => $dotaBets,
            'csgoBets' => $csgoBets,
        ];
    }







}

