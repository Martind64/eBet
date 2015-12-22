<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ControllerBase extends Controller
{
    /**
     * @return EntityManager
     */
    public function getEm()
    {
        return $this->get('doctrine.orm.default_entity_manager');
    }

    /**
     * @return User
     */
    public function getLoggedInUser()
    {
        return $this->getUser();
    }

}
