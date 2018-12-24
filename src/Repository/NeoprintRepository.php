<?php

namespace App\Repository;

use App\Entity\Neoprint;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Neoprint|null find($id, $lockMode = null, $lockVersion = null)
 * @method Neoprint|null findOneBy(array $criteria, array $orderBy = null)
 * @method Neoprint[]    findAll()
 * @method Neoprint[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NeoprintRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Neoprint::class);
    }

    // /**
    //  * @return Neoprint[] Returns an array of Neoprint objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Neoprint
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
