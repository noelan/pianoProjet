<?php

namespace App\Repository;

use App\Entity\Accord;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Accord|null find($id, $lockMode = null, $lockVersion = null)
 * @method Accord|null findOneBy(array $criteria, array $orderBy = null)
 * @method Accord[]    findAll()
 * @method Accord[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccordRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Accord::class);
    }

    public function findAllChords()
    {
        $qb = $this->createQueryBuilder('accord')
                   ->leftJoin('accord.notes', 'note')
                   ->addSelect('note')
                   ->getQuery();

        return $qb->execute();           

    }

    // /**
    //  * @return Accord[] Returns an array of Accord objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Accord
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
