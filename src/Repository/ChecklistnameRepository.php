<?php

namespace App\Repository;

use App\Entity\Checklistname;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Checklistname|null find($id, $lockMode = null, $lockVersion = null)
 * @method Checklistname|null findOneBy(array $criteria, array $orderBy = null)
 * @method Checklistname[]    findAll()
 * @method Checklistname[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChecklistnameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Checklistname::class);
    }

    // /**
    //  * @return Checklistname[] Returns an array of Checklistname objects
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
    public function findOneBySomeField($value): ?Checklistname
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
