<?php

namespace App\Repository;

use App\Entity\Top3dmg;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Top3dmg|null find($id, $lockMode = null, $lockVersion = null)
 * @method Top3dmg|null findOneBy(array $criteria, array $orderBy = null)
 * @method Top3dmg[]    findAll()
 * @method Top3dmg[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Top3dmgRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Top3dmg::class);
    }

    // /**
    //  * @return Top3dmg[] Returns an array of Top3dmg objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Top3dmg
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
