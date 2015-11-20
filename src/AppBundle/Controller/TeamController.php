<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\TeamType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Team;

class TeamController extends ControllerBase
{

    /**
     * @Route("/createTeam", name="createTeam")
     * @Template()
     */
    public function createTeamAction(Request $request)
    {
        $team = new Team();

        $form = $this->createForm(new TeamType(), $team);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $em = $this->getEm();
            $em->persist($team);
            $em->flush();
        }

        return
        [
            'form' => $form->createView()
        ];
    }



}
