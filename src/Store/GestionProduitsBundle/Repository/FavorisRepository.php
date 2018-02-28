<?php

namespace Store\GestionProduitsBundle\Repository;

/**
 * FavorisRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FavorisRepository extends \Doctrine\ORM\EntityRepository
{
    public function favorisproduit($uid,$ide)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT *
        FROM favoris
        WHERE id_client= :uid AND id_produit= :ide  ';

        $stmt = $conn->prepare($sql);
        $stmt->execute(['uid'=>$uid,'ide'=>$ide]);
        return $stmt->fetch();
    }
}