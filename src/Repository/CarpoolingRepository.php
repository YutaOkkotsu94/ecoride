<?php

namespace App\Repository;

use App\Entity\Carpooling;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Carpooling>
 */
class CarpoolingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Carpooling::class);
    }

//    /**
//     * @return Carpooling[] Returns an array of Carpooling objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Carpooling
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

public function findByFilters(?string $depart, ?string $arrivee, ?string $date, int|string $passagers)
{
    $qb = $this->createQueryBuilder('carpooling');

    if ($depart) {
        $qb->andWhere('carpooling.place_of_departure = :depart')
           ->setParameter('depart', $depart);
    }

    if ($arrivee) {
        $qb->andWhere('carpooling.place_of_arrival = :arrivee')
           ->setParameter('arrivee', $arrivee);
    }

    if ($date) {
        $startDate = new \DateTime($date);
        $endDate = (clone $startDate)->modify('+1 day');
    
        $qb->andWhere('carpooling.departure_date >= :startDate')
           ->andWhere('carpooling.departure_date < :endDate')
           ->setParameter('startDate', $startDate)
           ->setParameter('endDate', $endDate);
    }

    if ($passagers) {
        $qb->andWhere('carpooling.number_of_place >= :passagers')
           ->setParameter('passagers', $passagers);
    }

    return $qb->getQuery()->getResult();
}
}