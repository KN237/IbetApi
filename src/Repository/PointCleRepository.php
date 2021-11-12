<?php

namespace App\Repository;

use App\Entity\PointCle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PointCle|null find($id, $lockMode = null, $lockVersion = null)
 * @method PointCle|null findOneBy(array $criteria, array $orderBy = null)
 * @method PointCle[]    findAll()
 * @method PointCle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PointCleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PointCle::class);
    }

    // /**
    //  * @return PointCle[] Returns an array of PointCle objects
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
    public function findOneBySomeField($value): ?PointCle
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
