<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

class Bet {

    const STATUS_ACTIVE = 1;
    const STATUS_PAUSED = 2;
    const STATUS_CLOSED= 3;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $createdDatetime;

    /**
     * @var integer
     */
    private $status;

    /**
     * @var integer
     */
    private $result;

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
     * @var integer
     */
    private $homeOdds;

    /**
     * @var integer
     */
    private $awayOdds;

    /**
     * @var \DateTime
     */
    private $betTime;

    /**
     * @var \AppBundle\Entity\Game
     */
    private $game;

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
     * @return bet
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
     * Set status
     *
     * @param integer $status
     *
     * @return bet
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
     * @param Team $homeTeam
     *
     * @return Bet
     */
    public function setHomeTeam(Team $homeTeam = null)
    {
        $this->homeTeam = $homeTeam;

        return $this;
    }

    /**
     * Get homeTeam
     *
     * @return Team
     */
    public function getHomeTeam()
    {
        return $this->homeTeam;
    }

    /**
     * Set awayTeam
     *
     * @param Team $awayTeam
     *
     * @return Bet
     */
    public function setAwayTeam(Team $awayTeam = null)
    {
        $this->awayTeam = $awayTeam;

        return $this;
    }

    /**
     * Get awayTeam
     *
     * @return Team
     */
    public function getAwayTeam()
    {
        return $this->awayTeam;
    }

    /**
     * Set game
     *
     * @param Game $game
     *
     * @return Bet
     */
    public function setGame(Game $game = null)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return Game
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Set homeOdds
     *
     * @param integer $homeOdds
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
     * @return integer
     */
    public function getHomeOdds()
    {
        return $this->homeOdds;
    }

    /**
     * Set awayOdds
     *
     * @param integer $awayOdds
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
     * @return integer
     */
    public function getAwayOdds()
    {
        return $this->awayOdds;
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
}
