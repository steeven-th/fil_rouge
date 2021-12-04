<?php

namespace App\Repository;

use App\Entity\Calendarlist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Calendarlist|null find($id, $lockMode = null, $lockVersion = null)
 * @method Calendarlist|null findOneBy(array $criteria, array $orderBy = null)
 * @method Calendarlist[]    findAll()
 * @method Calendarlist[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CalendarlistRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Calendarlist::class);
    }

    // /**
    //  * @return Calendarlist[] Returns an array of Calendarlist objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Calendarlist
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
