<?php

namespace AppBundle\Controller;

use AppBundle\Controller\ControllerBase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Bet;

/**
 * @Route("games")
 */
class GamesController extends ControllerBase
{
    /**
     * @Route("/dota2", name="dota2")
     * @Template()
     */
    public function showDota2MatchesAction()
    {
        $betRepo = $this->getEM()->getRepository('AppBundle:Bet');
        $dotaBets = $betRepo->findDota2Matches();
        $user = $this->getLoggedInUser();


        return [
            'user' => $user,
            'dotaBets' => $dotaBets,
        ];
    }

    /**
     * @Route("/csgo", name="csgo")
     * @Template()
     */
    public function showCSGOMatchesAction()
    {
        $betRepo = $this->getEM()->getRepository('AppBundle:Bet');
        $csgoBets = $betRepo->findCsGoMatches();
        $user = $this->getLoggedInUser();


        return [
            'user' => $user,
            'csgoBets' => $csgoBets,
        ];
    }

    /**
     * @Route("/hearthstone", name="hearthstone")
     * @Template()
     */
    public function showHearthstoneMatchesAction()
    {
        $betRepo = $this->getEM()->getRepository('AppBundle:Bet');
        $hearthstone = $betRepo->findHearthstoneMatches();
        $user = $this->getLoggedInUser();

        return [
            'user' => $user,
            'hsBets' => $hearthstone,
        ];
    }

    /**
     * @Route("/starcraft", name="starcraft")
     * @Template()
     */
    public function showStarcraftMatchesAction()
    {
        $betRepo = $this->getEM()->getRepository('AppBundle:Bet');
        $starcraft = $betRepo->findStarcraftMatches();
        $user = $this->getLoggedInUser();

        return [
            'user' => $user,
            'scBets' => $starcraft,
        ];
    }
}
