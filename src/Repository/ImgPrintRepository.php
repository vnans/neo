<?php

namespace App\Repository;

use App\Entity\ImgPrint;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImgPrint|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImgPrint|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImgPrint[]    findAll()
 * @method ImgPrint[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImgPrintRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImgPrint::class);
    }

    // /**
    //  * @return ImgPrint[] Returns an array of ImgPrint objects
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
    public function findOneBySomeField($value): ?ImgPrint
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
