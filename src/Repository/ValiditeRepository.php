<?php

namespace App\Repository;

use App\Entity\Validite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Validite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Validite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Validite[]    findAll()
 * @method Validite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ValiditeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Validite::class);
    }

    // /**
    //  * @return Validite[] Returns an array of Validite objects
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
    public function findOneBySomeField($value): ?Validite
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
