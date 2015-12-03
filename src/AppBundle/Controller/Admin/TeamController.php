<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Controller\ControllerBase;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\TeamType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Team;

/**
 * @Route("/admin/team")
 */

class TeamController extends ControllerBase
{

    /**
     * @Route("/create", name="create-team")
     * @Route("/{team}")
     * @Template()
     */
    public function createTeamAction(Request $request, Team $team = null)
    {
        if(!$team)
        {
            $team = new Team();
        }

        $form = $this->createForm(new TeamType(), $team);

        if($request->getMethod() == 'POST')
        {
            $form->handleRequest($request);

            if($form->isValid())
            {
                $em = $this->getEm();
                $em->persist($team);
                $em->flush();
            }
        }



        return
        [
            'form' => $form->createView()
        ];
    }



}
