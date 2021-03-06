<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Controller\ControllerBase;
use AppBundle\Entity\Bet;
use AppBundle\Entity\Coupon;
use AppBundle\Form\Type\BetType;
use AppBundle\Form\Type\ResultType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Route("/admin/bet")
 */
class BetController extends ControllerBase
{
    /**
     * @Route("/create", name="create-bet")
     * @Route("/edit/{bet}", name="bet")
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
                return $this->redirectToRoute('admin-index');
            }
        }


        return [
            'bet' => $bet,
            'form' => $form->createView(),
        ];
    }


    /**
     * @Route("/result", name="show-result")
     * @Template()
     */
    public function showResultAction()
    {
        $bets = $this->getEM()->getRepository('AppBundle:Bet')->findActiveBets();

        return [
            'bets' => $bets
        ];

    }

    /**
     * @Route("/update/{bet}", name="update-result")
     * @Template()
     */
    public function updateResultAction(Request $request, Bet $bet)
    {
        $bets = $this->getEM()->getRepository('AppBundle:Bet')->findTeams($bet);

        return[
            'bets' => $bets
        ];
    }

    /**
     * @Route("/result/{bet}",name="result")
     */
    public function resultAction(Request $request, Bet $bet)
    {
        $em = $this->getEm();
        $result = $request->request->get('teamResult');

        $b = $em->getRepository('AppBundle:Bet')
            ->findOneBy(array(
                'id'   => $bet,
            ));

        /* @var Coupon $betcoupon */
        $betcoupon = $em->getRepository('AppBundle:Coupon')->findBets($bet, $result);

        foreach($betcoupon as $bc) /** @var Coupon $bc */
        {
            $balance = $bc->getUser()->getBalance();
            $wager = $bc->getWager();
            $odds = $bc->getOdds();
            $won = $wager * $odds;
            $total = $balance + $won;
            $bc->getUser()->setBalance($total);

            $bc = $bc->getUser()->setBalance($total);
            $em->persist($bc);
            $em->flush($bc);
        }

        $b
            ->setResult($result)
            ->setStatus(Bet::STATUS_CLOSED)
            ->setClosedDatetime(new \DateTime('now'));

        $em->persist($b);
        $em->flush($b);

        return $this->redirectToRoute('show-result');
    }


}
