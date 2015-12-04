<?php

namespace AppBundle\Controller;

use AppBundle\Controller\ControllerBase;
use AppBundle\Entity\User;
use AppBundle\Form\Type\FundsType;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/balance")
 */
class BalanceController extends ControllerBase
{
    /**
     * @Route("/deposit",name="deposit-balance")
     */
    public function depositAction(Request $request)
    {
        $em = $this->getEm();
        $user = $this->getUser();

        $balance = $request->request->get('deposit-balance');

        $user
            ->setBalance($user->getBalance() + $balance);


        $em->persist($user);
        $em->flush($user);

        return $this->redirectToRoute('show-balance');

    }

    /**
     * @Route("/index",name="show-balance")
     * @Template()
     */
    public function indexAction()
    {
        $user = $this->getUser();

        return [
            'user' => $user
        ];
    }

    /**
     * @Route("/withdraw",name="withdraw-balance")
     */
    public function withdrawAction(Request $request)
    {
        $em = $this->getEm();
        $user = $this->getUser();

        $wbalance = $request->request->get('withdraw-balance');
        $user
            ->setBalance($user->getBalance() - $wbalance);


        $em->persist($user);
        $em->flush($user);

        return $this->redirectToRoute('show-balance');

    }
}

