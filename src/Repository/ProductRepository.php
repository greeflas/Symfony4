<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Product repository.
 */
class ProductRepository extends EntityRepository
{
    /**
     * Find product by ID and join it to category.
     *
     * @param int $productId
     *
     * @return \App\Entity\Product
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneByIdJoinedToCategory($productId)
    {
        return $this->createQueryBuilder('p')
            // p.category refers to the "category" property on product
            ->innerJoin('p.category', 'c')
            // selects all the category data to avoid the query
            ->addSelect('c')
            ->andWhere('p.id = :id')
            ->setParameter(':id', $productId)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
