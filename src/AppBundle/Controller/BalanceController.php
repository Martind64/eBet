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
     * @Route("/index",name="addFunds")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getEM();
        $user = $this->getUser();
        $emptyUser = new User();

        // build form
        $addForm = $this->container
            ->get('form.factory')
            ->createNamedBuilder('addFunds', 'form', NULL, array('validation_groups' => array()))
            ->add('balance', 'number')
            ->add('submit', 'submit');

        // get form from form builder
        $addFundsForm = $addForm
            ->getForm()
            ->handleRequest($request);

        $withdrawForm = $this->container
            ->get('form.factory')
            ->createNamedBuilder('addFunds', 'form', NULL, array('validation_groups' => array()))
            ->add('balance', 'number')
            ->add('submit', 'submit');

        // get form from form builder
        $withdrawFundsForm = $withdrawForm
            ->getForm()
            ->handleRequest($request);


                if($addFundsForm->isValid())
                {
                    $balance = $user->getBalance() + $emptyUser->getBalance();
                    $user->setBalance($balance);
                    $em->persist($user);
                    $em->flush();
                }

                if($withdrawFundsForm->isValid())
                {
                    $balance = $user->getBalance() - $emptyUser->getBalance();
                    $user->setBalance($balance);
                    $em->persist($user);
                    $em->flush();
                }



        return [
            'addForm' => $addFundsForm->createView(),
            'withdrawForm' => $withdrawFundsForm->createView(),
            'user' => $user
        ];

    }

    /**
     * @Route(name="withdrawFunds")
     * @Template()
     */
    public function withdrawFundsAction(Request $request)
    {
        //        if($request->getMethod() == 'POST')
//        {
//            $addForm->handleRequest($request);
//            if($addForm->isValid())
//            {
//                $balance = $user->getBalance() + $emptyUser->getBalance();
//                $user->setBalance($balance);
//                $em->persist($user);
//                $em->flush();
//            }
//
//            $withdrawForm->handleRequest($request);
//            if($withdrawForm->isValid())
//            {
//                $balance = $user->getBalance() - $emptyUser->getBalance();
//                $user->setBalance($balance);
//                $em->persist($user);
//                $em->flush();
//            }
//
//        }







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

