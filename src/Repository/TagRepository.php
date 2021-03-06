<?php

namespace App\Repository;

use App\Entity\Tag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tag|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tag|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tag[]    findAll()
 * @method Tag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tag::class);
    }

  

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Tag $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Tag $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    // * @return Tag
    // */

    // public function findOneByLabel($label)
    // {
    //     return $this->createQueryBuilder('t')
    //         ->andWhere('t.label = :label')
    //         ->setParameter('label', $label)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }
    
    public function findOneByLabel($label)
    {
        return $this->createQueryBuilder(alias:'t')
                    ->where('t.label = :label')
                    ->setParameter('label', $label)
                    ->getQuery()
                    ->getResult();
    }
    
}
