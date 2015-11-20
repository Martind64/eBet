<?php

namespace AppBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Game;


class GameControler extends ControllerBase
{
    /**
     * @Route("/MarkPedersen", name="homepage")
     */
    public function createGameAction(Request $request)
    {
        $game = new Game();

        $form = $this->createForm(GameType(), $game);
        $form->handleRequest($request);

        $em = $this->getEm();
        $em->persist($game);
        $em->flush();
        
        return $this->render('')
    }
}

