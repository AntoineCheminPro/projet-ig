<?php

namespace App\Repository;

use App\Entity\ReceipeAlimentQuantity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReceipeAlimentQuantity>
 *
 * @method ReceipeAlimentQuantity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReceipeAlimentQuantity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReceipeAlimentQuantity[]    findAll()
 * @method ReceipeAlimentQuantity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReceipeAlimentQuantityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReceipeAlimentQuantity::class);
    }

    public function add(ReceipeAlimentQuantity $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ReceipeAlimentQuantity $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ReceipeAlimentQuantity[] Returns an array of ReceipeAlimentQuantity objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ReceipeAlimentQuantity
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
