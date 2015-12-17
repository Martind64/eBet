<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

class Coupon {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $createdDatetime;

    /**
     * @var string
     */
    private $wager;


    public function __construct()
    {
        $this->createdDatetime = new DateTime('now');
    }
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
     * @return Coupon
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

    /**
     * Set wager
     *
     * @param string $wager
     *
     * @return Coupon
     */
    public function setWager($wager)
    {
        $this->wager = $wager;

        return $this;
    }

    /**
     * Get wager
     *
     * @return string
     */
    public function getWager()
    {
        return $this->wager;
    }
    /**
     * @var \AppBundle\Entity\Bet
     */
    private $bet;


    /**
     * Set bet
     *
     * @param \AppBundle\Entity\Bet $bet
     *
     * @return Coupon
     */
    public function setBet(\AppBundle\Entity\Bet $bet = null)
    {
        $this->bet = $bet;

        return $this;
    }

    /**
     * Get bet
     *
     * @return \AppBundle\Entity\Bet
     */
    public function getBet()
    {
        return $this->bet;
    }
    /**
     * @var \AppBundle\Entity\User
     */
    private $user;


    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Coupon
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * @var string
     */
    private $team;

    /**
     * @var string
     */
    private $odds;


    /**
     * Set team
     *
     * @param string $team
     *
     * @return Coupon
     */
    public function setTeam($team)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return string
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set odds
     *
     * @param string $odds
     *
     * @return Coupon
     */
    public function setOdds($odds)
    {
        $this->odds = $odds;

        return $this;
    }

    /**
     * Get odds
     *
     * @return string
     */
    public function getOdds()
    {
        return $this->odds;
    }
}
