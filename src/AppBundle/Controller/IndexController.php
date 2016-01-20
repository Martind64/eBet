<?php

namespace AppBundle\Controller;

use AppBundle\Controller\ControllerBase;
use AppBundle\Entity\Coupon;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Bet;

class IndexController extends ControllerBase
{
    /**
     * @Route("/", name="index")
     * @Template()
     */
    public function showMatchesAction()
    {
        $betRepo = $this->getEM()->getRepository('AppBundle:Bet');
        $dotaBets = $betRepo->findDota2Matches();
        $csgoBets = $betRepo->findCsGoMatches();
        $hsBets = $betRepo->findHearthstoneMatches();
        $scBets = $betRepo->findStarcraftMatches();
        $user = $this->getLoggedInUser();


        return [
            'dotaBets' => $dotaBets,
            'csgoBets' => $csgoBets,
            'hsBets' => $hsBets,
            'scBets' => $scBets,
            'user' => $user,
        ];
    }


    /**
     * @Route("/coupon/{betId}", name="create-coupon")
     */
    public function createCouponAction(Request $request, $betId)
    {
        $user = $this->getLoggedInUser();
        if(!$user)
        {
            return $this->redirectToRoute('fos_user_security_login');
        }

        $em = $this->getEM();
        $coupon = new Coupon();
        $bet = $em->getRepository(Bet::class)->find($betId);

        if ($request->request->has('homeButton'))
        {
            $userBet = $request->request->get('bet-amount');
            $team = $request->request->get('bet-hometeam');
            $odds = $request->request->get('bet-homeodds');


            $coupon
                ->setBet($bet)
                ->setUser($user)
                ->setWager($userBet)
                ->setOdds($odds)
                ->setTeam($team);

            if ($userBet <= $user->getBalance()) {
                $user->setBalance($user->getBalance() - $userBet);
                $em->persist($user);
            }
            else {
                $this->get('session')->getFlashBag()->add('notice','You don´t have enough money on your account!');
//                throw new \Exception('You don´t have enough money on account');
            }

            $em->persist($coupon);
            $em->flush();
        }

        if ($request->request->has('awayButton'))
        {
            $userBet = $request->request->get('bet-amount');
            $team = $request->request->get('bet-awayteam');
            $odds = $request->request->get('bet-awayodds');

            $coupon
                ->setBet($bet)
                ->setUser($user)
                ->setWager($userBet)
                ->setOdds($odds)
                ->setTeam($team);

            if ($userBet <= $user->getBalance()) {
                $user->setBalance($user->getBalance() - $userBet);
                $em->persist($user);
            }
            else {
                $this->get('session')->getFlashBag()->add('notice','You don´t have enough money on your account!');
//                throw new \Exception('You don´t have enough money on your account!');
            }

            $em->persist($coupon);

            $em->flush();
        }


        return $this->redirectToRoute('index');
    }
}

