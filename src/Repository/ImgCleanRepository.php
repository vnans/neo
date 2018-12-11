<?php

namespace App\Repository;

use App\Entity\ImgClean;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImgClean|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImgClean|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImgClean[]    findAll()
 * @method ImgClean[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImgCleanRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImgClean::class);
    }

    // /**
    //  * @return ImgClean[] Returns an array of ImgClean objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImgClean
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
