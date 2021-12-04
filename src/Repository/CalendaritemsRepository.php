<?php

namespace App\Repository;

use App\Entity\Calendaritems;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Calendaritems|null find($id, $lockMode = null, $lockVersion = null)
 * @method Calendaritems|null findOneBy(array $criteria, array $orderBy = null)
 * @method Calendaritems[]    findAll()
 * @method Calendaritems[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CalendaritemsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Calendaritems::class);
    }

    // /**
    //  * @return Calendaritems[] Returns an array of Calendaritems objects
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
    public function findOneBySomeField($value): ?Calendaritems
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
