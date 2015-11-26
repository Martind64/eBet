<?php

namespace AppBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Game;


/**
 * @Route("admin")
 */
class AdminController extends ControllerBase
{
    /**
     * @Route("/index", name="admin-index")
     * @Template()
     */
    public function showAdminIndexAction()
    {
        $bets = $this->getEM()->getRepository('AppBundle:Bet')->findAll();

        return [
            'bets' => $bets
        ];


    }
}

