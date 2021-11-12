<?php

namespace App\Repository;

use App\Entity\EquipeMatchs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EquipeMatchs|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquipeMatchs|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquipeMatchs[]    findAll()
 * @method EquipeMatchs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipeMatchsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EquipeMatchs::class);
    }

    // /**
    //  * @return EquipeMatchs[] Returns an array of EquipeMatchs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EquipeMatchs
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
