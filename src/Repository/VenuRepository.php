<?php

namespace App\Repository;

use App\Entity\Venu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Venu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Venu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Venu[]    findAll()
 * @method Venu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VenuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Venu::class);
    }

    // /**
    //  * @return Venu[] Returns an array of Venu objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Venu
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
