<?php

namespace App\Repository;

use App\Entity\LatestSocial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LatestSocial|null find($id, $lockMode = null, $lockVersion = null)
 * @method LatestSocial|null findOneBy(array $criteria, array $orderBy = null)
 * @method LatestSocial[]    findAll()
 * @method LatestSocial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LatestSocialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LatestSocial::class);
    }

    // /**
    //  * @return LatestSocial[] Returns an array of LatestSocial objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LatestSocial
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
