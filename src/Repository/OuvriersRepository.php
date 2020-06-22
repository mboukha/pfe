<?php

namespace App\Repository;

use App\Entity\Ouvriers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ouvriers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ouvriers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ouvriers[]    findAll()
 * @method Ouvriers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OuvriersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ouvriers::class);
    }

    // /**
    //  * @return Ouvriers[] Returns an array of Ouvriers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ouvriers
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
