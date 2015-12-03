<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("admin")
 */
class AdminController extends ControllerBase
{
    /**
     * @Route("/index", name="admin-index")
     * @Template()
     */
    public function showMatchesAction()
    {
        $bets = $this->getEM()->getRepository('AppBundle:Bet')->findAll();

        return [
            'bets' => $bets
        ];

    }
}

