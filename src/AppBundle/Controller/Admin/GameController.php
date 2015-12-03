<?php

namespace AppBundle\Controller\Admin;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Game;
use AppBundle\Form\Type\GameType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


/**
 * @Route("/admin/game")
 */
class GameController extends ControllerBase
{
    /**
     * @Route("/create", name="create-game")
     * @Route("/{game}")
     * @Template()
     */
    public function createGameAction(Request $request, game $game = null)
    {
        if(!$game)
        {
            $game = new Game();
        }

        $form = $this->createForm(new GameType(), $game);

        if($request->getMethod('POST'))
        {
            $form->handleRequest($request);

            if($form->isValid())
            {
                $em = $this->getEm();
                $em->persist($game);
                $em->flush();
            }
        }

        return [
            'form' =>  $form->createView()
        ];
    }
}

