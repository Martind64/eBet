<?php

namespace AppBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class CouponRepository extends EntityRepository
{
    public function findBets($bet, $team)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();

        $query = $qb->select('c')
            ->from('AppBundle:Coupon', 'c')
            ->join('c.bet', 'g')
            ->where('c.bet = g.id')
            ->andWhere('c.bet = :bet')
            ->setParameter('bet', $bet)
            ->andWhere('c.team = :team')
            ->setParameter('team', $team);

        return $query->getQuery()->getResult();
    }
}