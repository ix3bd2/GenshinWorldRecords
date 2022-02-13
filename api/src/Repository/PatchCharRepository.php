<?php

namespace App\Repository;

use App\Entity\PatchChar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PatchChar|null find($id, $lockMode = null, $lockVersion = null)
 * @method PatchChar|null findOneBy(array $criteria, array $orderBy = null)
 * @method PatchChar[]    findAll()
 * @method PatchChar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatchCharRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PatchChar::class);
    }

    // /**
    //  * @return PatchChar[] Returns an array of PatchChar objects
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
    public function findOneBySomeField($value): ?PatchChar
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
