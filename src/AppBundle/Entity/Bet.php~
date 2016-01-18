<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

class Bet {

    const STATUS_ACTIVE = 1;
    const STATUS_PAUSED = 2;
    const STATUS_CLOSED= 3;

    public function __construct()
    {
        $this->createdDatetime = new DateTime('now');
    }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $createdDatetime;

    /**
     * @var \DateTime
     */
    private $betTime;

    /**
     * @var integer
     */
    private $status;

    /**
     * @var integer
     */
    private $result;

    /**
     * @var string
     */
    private $homeOdds;

    /**
     * @var string
     */
    private $awayOdds;

    /**
     * @var \DateTime
     */
    private $closedDatetime;

    /**
     * @var \AppBundle\Entity\Team
     */
    private $homeTeam;

    /**
     * @var \AppBundle\Entity\Team
     */
    private $awayTeam;

    /**
     * @var \AppBundle\Entity\Game
     */
    private $game;


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
     * @return Bet
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
     * Set betTime
     *
     * @param \DateTime $betTime
     *
     * @return Bet
     */
    public function setBetTime($betTime)
    {
        $this->betTime = $betTime;

        return $this;
    }

    /**
     * Get betTime
     *
     * @return \DateTime
     */
    public function getBetTime()
    {
        return $this->betTime;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Bet
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set result
     *
     * @param integer $result
     *
     * @return Bet
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result
     *
     * @return integer
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Set homeOdds
     *
     * @param string $homeOdds
     *
     * @return Bet
     */
    public function setHomeOdds($homeOdds)
    {
        $this->homeOdds = $homeOdds;

        return $this;
    }

    /**
     * Get homeOdds
     *
     * @return string
     */
    public function getHomeOdds()
    {
        return $this->homeOdds;
    }

    /**
     * Set awayOdds
     *
     * @param string $awayOdds
     *
     * @return Bet
     */
    public function setAwayOdds($awayOdds)
    {
        $this->awayOdds = $awayOdds;

        return $this;
    }

    /**
     * Get awayOdds
     *
     * @return string
     */
    public function getAwayOdds()
    {
        return $this->awayOdds;
    }

    /**
     * Set closedDatetime
     *
     * @param \DateTime $closedDatetime
     *
     * @return Bet
     */
    public function setClosedDatetime($closedDatetime)
    {
        $this->closedDatetime = $closedDatetime;

        return $this;
    }

    /**
     * Get closedDatetime
     *
     * @return \DateTime
     */
    public function getClosedDatetime()
    {
        return $this->closedDatetime;
    }

    /**
     * Set homeTeam
     *
     * @param \AppBundle\Entity\Team $homeTeam
     *
     * @return Bet
     */
    public function setHomeTeam(\AppBundle\Entity\Team $homeTeam = null)
    {
        $this->homeTeam = $homeTeam;

        return $this;
    }

    /**
     * Get homeTeam
     *
     * @return \AppBundle\Entity\Team
     */
    public function getHomeTeam()
    {
        return $this->homeTeam;
    }

    /**
     * Set awayTeam
     *
     * @param \AppBundle\Entity\Team $awayTeam
     *
     * @return Bet
     */
    public function setAwayTeam(\AppBundle\Entity\Team $awayTeam = null)
    {
        $this->awayTeam = $awayTeam;

        return $this;
    }

    /**
     * Get awayTeam
     *
     * @return \AppBundle\Entity\Team
     */
    public function getAwayTeam()
    {
        return $this->awayTeam;
    }

    /**
     * Set game
     *
     * @param \AppBundle\Entity\Game $game
     *
     * @return Bet
     */
    public function setGame(\AppBundle\Entity\Game $game = null)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return \AppBundle\Entity\Game
     */
    public function getGame()
    {
        return $this->game;
    }
}
