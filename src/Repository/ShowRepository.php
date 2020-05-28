<?php

namespace App\Repository;

use App\Entity\MusicalStyle;
use App\Entity\Show;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Show|null find($id, $lockMode = null, $lockVersion = null)
 * @method Show|null findOneBy(array $criteria, array $orderBy = null)
 * @method Show[]    findAll()
 * @method Show[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Show::class);
    }

        public function getShowsByStyle($id){

        $cnx = $this->getEntityManager()->getConnection();
        $sql = 'SELECT s.id as Show_id,
	            a.name as Artist,
	            s.name as TourName,
	            c.name as city,
                v.name as Venu,
                s.date as Date,
                s.rate as Rate
                FROM `show` as s
	            JOIN venu as v
                ON s.venu_id = v.id
                JOIN city as c
                ON s.city_id = c.id
                JOIN artist as a
                ON s.artist_id = a.id
                JOIN musical_style as ms
                ON s.style_id = ms.id
                WHERE s.style_id = :id;';
            $statment = $cnx->prepare($sql);
            $statment->execute(['id' => $id]);
            return $statment->fetchAll();
        }

        public function getShowsByCity($id){

                $cnx = $this->getEntityManager()->getConnection();
                $sql = 'SELECT s.id as Show_id,
		                s.name as TourName,
	                    a.name as Artist,
                         ms.name as Style,
	                    c.name as city,
                         v.name as Venu,
                         s.date as Date,
                        s.rate as Rate
                        FROM `show` as s
	                    JOIN venu as v
                        ON s.venu_id = v.id
                        JOIN city as c
                        ON s.city_id = c.id
                        JOIN artist as a
                        ON s.artist_id = a.id
                        JOIN musical_style as ms
                        ON s.style_id = ms.id
                        WHERE s.city_id = :id;';
                $statment = $cnx->prepare($sql);
                $statment->execute(['id' => $id]);
                return $statment->fetchAll();
        }

    public function getShowsByArtist($id){

        $cnx = $this->getEntityManager()->getConnection();
        $sql = 'SELECT s.id as Show_id,
		                s.name as TourName,
	                    a.name as Artist,
                         ms.name as Style,
	                     c.name as city,
                         v.name as Venu,
                         s.date as Date,
                        s.rate as Rate
                        FROM `show` as s
	                    JOIN venu as v
                        ON s.venu_id = v.id
                        JOIN city as c
                        ON s.city_id = c.id
                        JOIN artist as a
                        ON s.artist_id = a.id
                        JOIN musical_style as ms
                        ON s.style_id = ms.id
                        WHERE s.artist_id = :id;';
        $statment = $cnx->prepare($sql);
        $statment->execute(['id' => $id]);
        return $statment->fetchAll();
    }


    public function getArtistTotalRate($id){

        $cnx = $this->getEntityManager()->getConnection();
        $sql = 'SELECT SUM(rate) as notes, COUNT(rate) as nbNotes FROM `show` WHERE artist_id = :id;';
        $statment = $cnx->prepare($sql);
        $statment->execute(['id' => $id]);
        return $statment->fetchAll();


    }







    // /**
    //  * @return Show[] Returns an array of Show objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Show
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
