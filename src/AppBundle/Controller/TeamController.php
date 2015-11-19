<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Team;

class TeamController extends ControllerBase
{

    /**
     * @Route("/createTeam", name="createTeam")
     * @Template()
     */
    public function createTeam(Request $request)
    {
        $team = new Team();

        $form = $this->createForm(new Team(), $team);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $em = $this->getEM();
            $em->persist($team);
            $em->flush();
        }

        return
        [
            'Form' => $form->createView()
        ];
    }



}
