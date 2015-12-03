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
            ->andWhere('g.name = :Dota2')
            ->setParameter('Dota2', 'Dota2');

        return $query->getQuery()->getResult();

    }

    public function findCsGoMatches()
    {

//        SELECT * FROM bets
//        JOIN games ON games.id = bets.game_id
//        WHERE games.name = 'Dota'



    }





}
