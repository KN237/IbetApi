<?php

namespace App\Repository;

use App\Entity\PronoLive;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PronoLive|null find($id, $lockMode = null, $lockVersion = null)
 * @method PronoLive|null findOneBy(array $criteria, array $orderBy = null)
 * @method PronoLive[]    findAll()
 * @method PronoLive[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PronoLiveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PronoLive::class);
    }

    // /**
    //  * @return PronoLive[] Returns an array of PronoLive objects
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
    public function findOneBySomeField($value): ?PronoLive
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
