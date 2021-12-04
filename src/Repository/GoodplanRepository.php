<?php

namespace App\Repository;

use App\Entity\Goodplan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Goodplan|null find($id, $lockMode = null, $lockVersion = null)
 * @method Goodplan|null findOneBy(array $criteria, array $orderBy = null)
 * @method Goodplan[]    findAll()
 * @method Goodplan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GoodplanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Goodplan::class);
    }

    // /**
    //  * @return Goodplan[] Returns an array of Goodplan objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Goodplan
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
