<?php

namespace AppBundle\Controller;

use AppBundle\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends ControllerBase
{
    /**
     * @Route("/addFunds/{money}", name="addFunds")
     */
    public function addFunds($money)
    {
        $em = $this->getEM();
        $user = $this->getUser();

        $balance = $user->getBalance() + $money;

        $result = $user->setBalance($balance);

        $em->persist($result);
        $em->flush();

        return $this->redirectToRoute('fos_user_profile_show');

    }




}

