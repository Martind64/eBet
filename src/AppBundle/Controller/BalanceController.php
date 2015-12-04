<?php

namespace AppBundle\Controller;

use AppBundle\Controller\ControllerBase;
use AppBundle\Entity\User;
use AppBundle\Form\Type\AddFundsType;
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
     * @Route("/index",name="addFunds")
     * @Template()
     */
    public function addFundsAction(Request $request)
    {
        $em = $this->getEM();
        $user = $this->getUser();
        $emptyUser = new User();

        $form = $this->createForm(new AddFundsType(), $emptyUser);

        if($request->getMethod() == 'POST')
        {
            $form->handleRequest($request);
            if($form->isValid())
            {
                $balance = $user->getBalance() + $emptyUser->getBalance();
                $user->setBalance($balance);
                $em->persist($user);
                $em->flush();
            }
        }
        return [
            'form' => $form->createView(),
            'user' => $user
        ];

    }

    /**
     * @Route(name="withdrawFunds")
     * @Template()
     */
    public function withdrawFundsAction(Request $request)
    {
        $em = $this->getEM();
        $user = $this->getUser();
        $emptyUser = new User();

        $form = $this->createForm(new AddFundsType(), $emptyUser);

        if($request->getMethod() == 'POST')
        {
            $form->handleRequest($request);
            if($form->isValid())
            {
                $balance = $user->getBalance() - $emptyUser->getBalance();
                $user->setBalance($balance);
                $em->persist($user);
                $em->flush();
            }

        }
        return [
            'form' => $form->createView(),
            'user' => $user
        ];

    }



}

