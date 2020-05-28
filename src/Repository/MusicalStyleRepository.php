<?php

namespace App\Repository;

use App\Entity\MusicalStyle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MusicalStyle|null find($id, $lockMode = null, $lockVersion = null)
 * @method MusicalStyle|null findOneBy(array $criteria, array $orderBy = null)
 * @method MusicalStyle[]    findAll()
 * @method MusicalStyle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MusicalStyleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MusicalStyle::class);
    }

    // /**
    //  * @return MusicalStyle[] Returns an array of MusicalStyle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MusicalStyle
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
