<?php

namespace App\Repository;

use App\Entity\Infosbaby;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Infosbaby|null find($id, $lockMode = null, $lockVersion = null)
 * @method Infosbaby|null findOneBy(array $criteria, array $orderBy = null)
 * @method Infosbaby[]    findAll()
 * @method Infosbaby[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InfosbabyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Infosbaby::class);
    }

    // /**
    //  * @return Infosbaby[] Returns an array of Infosbaby objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Infosbaby
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
