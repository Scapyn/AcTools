<?php

namespace App\Repository;

use App\Entity\ActDocument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ActDocument|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActDocument|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActDocument[]    findAll()
 * @method ActDocument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActDocumentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ActDocument::class);
    }

//    /**
//     * @return ActDocument[] Returns an array of ActDocument objects
//     */
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
    public function findOneBySomeField($value): ?ActDocument
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
