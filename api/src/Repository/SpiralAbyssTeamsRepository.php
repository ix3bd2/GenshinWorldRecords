<?php

namespace App\Repository;

use App\Entity\SpiralAbyssTeams;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SpiralAbyssTeams>
 *
 * @method SpiralAbyssTeams|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpiralAbyssTeams|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpiralAbyssTeams[]    findAll()
 * @method SpiralAbyssTeams[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpiralAbyssTeamsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpiralAbyssTeams::class);
    }

    public function add(SpiralAbyssTeams $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SpiralAbyssTeams $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SpiralAbyssTeams[] Returns an array of SpiralAbyssTeams objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SpiralAbyssTeams
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
