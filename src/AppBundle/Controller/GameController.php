<?php

namespace AppBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Game;
use AppBundle\Form\Type\GameType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class GameController extends ControllerBase
{
    /**
     * @Route("/MarkPedersen", name="homepage")
     * @Template()
     */
    public function createGameAction(Request $request)
    {
        $game = new Game();

        $form = $this->createForm(new GameType(), $game);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $em = $this->getEm();
            $em->persist($game);
            $em->flush();
        }
        return [
            'form' =>  $form->createView()
        ];
    }
}

