<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Team {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $createdDatetime;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdDatetime
     *
     * @param \DateTime $createdDatetime
     *
     * @return team
     */
    public function setCreatedDatetime($createdDatetime)
    {
        $this->createdDatetime = $createdDatetime;

        return $this;
    }

    /**
     * Get createdDatetime
     *
     * @return \DateTime
     */
    public function getCreatedDatetime()
    {
        return $this->createdDatetime;
    }
}
