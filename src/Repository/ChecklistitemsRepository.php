<?php

namespace App\Repository;

use App\Entity\Checklistitems;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Checklistitems|null find($id, $lockMode = null, $lockVersion = null)
 * @method Checklistitems|null findOneBy(array $criteria, array $orderBy = null)
 * @method Checklistitems[]    findAll()
 * @method Checklistitems[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChecklistitemsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Checklistitems::class);
    }

    // /**
    //  * @return Checklistitems[] Returns an array of Checklistitems objects
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
    public function findOneBySomeField($value): ?Checklistitems
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
