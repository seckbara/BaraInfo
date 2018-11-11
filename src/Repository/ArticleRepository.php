<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    const MAX_RESULTS_ARTICLES_LAST = 2;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Article::class);
    }

    /**
     * @return mixed
     * Récupération des 2 derniers articles
     */
    public function getLastArticlesNational()
    {
        return $this->createQueryBuilder('a')
            ->where('a.actualite = :val')
            ->setParameter('val', 'national')
            ->setMaxResults(self::MAX_RESULTS_ARTICLES_LAST)
            ->getQuery()
            ->getResult();
    }


    /**
     * @return mixed
     * Récupération des 2 derniers articles
     */
    public function getLastArticlesInterNational()
    {
        return $this->createQueryBuilder('a')
            ->where('a.actualite = :val')
            ->setParameter('val', 'international')
            ->setMaxResults(self::MAX_RESULTS_ARTICLES_LAST)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Article[] Returns an array of Article objects
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
    public function findOneBySomeField($value): ?Article
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
