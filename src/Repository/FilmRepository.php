<?php

namespace App\Repository;

use App\Entity\Film;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Film>
 */
class FilmRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Film::class);
    }

    /**
     * @return Film[] Returns an array of Film objects
     */
    public function findByPlatform($idPlat): array
    {
        return $this->createQueryBuilder('f')
            ->innerJoin('f.platformes', 'p')
            ->andWhere('p.id = :id')
            ->setParameter('id', $idPlat)
            ->orderBy('f.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findByPlatformQuery($idPlat)
    {
        return $this->createQueryBuilder('f')
            ->innerJoin('f.platformes', 'p')
            ->andWhere('p.id = :id')
            ->setParameter('id', $idPlat)
            ->orderBy('f.id', 'ASC')
            ->getQuery();
    }

    //    public function findOneBySomeField($value): ?Film
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
