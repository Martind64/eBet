<?php

namespace AppBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class BetRepository extends EntityRepository
{

    public function findDota2Matches()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();

        $query = $qb->select('b')
            ->from('AppBundle:Bet', 'b')
            ->join('b.game', 'g')
            ->where('b.game = g.id')
            ->andWhere('b.status = 1')
            ->andWhere('g.name = :dota2')
            ->setParameter('dota2', 'dota2');

        return $query->getQuery()->getResult();
    }

    public function findCsGoMatches()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();

        $query = $qb->select('b')
            ->from('AppBundle:Bet', 'b')
            ->join('b.game', 'g')
            ->where('b.game = g.id')
            ->andWhere('b.status = 1')
            ->andWhere('g.name = :csgo')
            ->setParameter('csgo', 'csgo');

        return $query->getQuery()->getResult();
    }

    public function findHearthstoneMatches()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();

        $query = $qb->select('b')
            ->from('AppBundle:Bet', 'b')
            ->join('b.game', 'g')
            ->where('b.game = g.id')
            ->andWhere('b.status = 1')
            ->andWhere('g.name = :hs')
            ->setParameter('hs', 'hearthstone');

        return $query->getQuery()->getResult();
    }

    public function findStarcraftMatches()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();

        $query = $qb->select('b')
            ->from('AppBundle:Bet', 'b')
            ->join('b.game', 'g')
            ->where('b.game = g.id')
            ->andWhere('b.status = 1')
            ->andWhere('g.name = :sc')
            ->setParameter('sc', 'starcraft2');

        return $query->getQuery()->getResult();
    }

    public function findActiveBets()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();

        $query = $qb->select('b')
            ->from('AppBundle:Bet', 'b')
            ->where('b.status = 1');

        return $query->getQuery()->getResult();
    }

    public function findTeams($bet)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();

        $query = $qb->select('b')
            ->from('AppBundle:Bet', 'b')
            ->andWhere('b.id = :bet')
            ->setParameter('bet', $bet);

        return $query->getQuery()->getResult();
    }



}
