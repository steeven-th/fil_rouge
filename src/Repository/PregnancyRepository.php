<?php

namespace App\Repository;

use App\Entity\Pregnancy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Pregnancy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pregnancy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pregnancy[]    findAll()
 * @method Pregnancy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PregnancyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pregnancy::class);
    }

    // /**
    //  * @return Pregnancy[] Returns an array of Pregnancy objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Pregnancy
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
