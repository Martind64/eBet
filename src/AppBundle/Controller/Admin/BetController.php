<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Controller\ControllerBase;
use AppBundle\Entity\Bet;
use AppBundle\Form\Type\BetType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Route("/admin/bet")
 */
class BetController extends ControllerBase
{
    /**
     * @Route("/create", name="create-bet")
     * @Route("/{bet}", name="bet")
     * @Template()
     */
    public function createBetAction(Request $request, Bet $bet = null)
    {
        if(!$bet) {
            $bet = new Bet();
        }

        $form = $this->createForm(new BetType(), $bet);

        if($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if($form->isValid()) {
                $bet->setStatus(Bet::STATUS_ACTIVE);

                $em = $this->getEm();
                $em->persist($bet);
                $em->flush($bet);
            }
        }

        return [
            'bet' => $bet,
            'form' => $form->createView(),
        ];
    }

}
