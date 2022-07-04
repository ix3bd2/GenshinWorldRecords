<?php

namespace App\Repository;

use App\Entity\Top3SpiralAbyss;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Top3SpiralAbyss>
 *
 * @method Top3SpiralAbyss|null find($id, $lockMode = null, $lockVersion = null)
 * @method Top3SpiralAbyss|null findOneBy(array $criteria, array $orderBy = null)
 * @method Top3SpiralAbyss[]    findAll()
 * @method Top3SpiralAbyss[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Top3SpiralAbyssRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Top3SpiralAbyss::class);
    }

    public function add(Top3SpiralAbyss $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Top3SpiralAbyss $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Top3SpiralAbyss[] Returns an array of Top3SpiralAbyss objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Top3SpiralAbyss
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
