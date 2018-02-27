<?php

namespace Transactions\GestionCommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lignecommande
 *
 * @ORM\Table(name="lignecommande")
 * @ORM\Entity(repositoryClass="Transactions\GestionCommandeBundle\Repository\LignecommandeRepository")
 */
class Lignecommande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_client", type="integer")
     */
    private $idClient;

    /**
     * @var int
     *
     * @ORM\Column(name="id_commande", type="integer")
     */
    private $idCommande;
    /**
     * @var int
     *
     * @ORM\Column(name="id_produit", type="integer")
     */
    private $idProduit;
    /**
     * @var int
     *
     * @ORM\Column(name="qte", type="integer")
     */
    private $qte;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idClient
     *
     * @param integer $idClient
     *
     * @return Lignecommande
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;

        return $this;
    }

    /**
     * Get idClient
     *
     * @return int
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * Set idCommande
     *
     * @param integer $idCommande
     *
     * @return Lignecommande
     */
    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;

        return $this;
    }

    /**
     * Get idCommande
     *
     * @return int
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }
    /**
     * Set idProduit
     *
     * @param integer $idProduit
     *
     * @return Lignecommande
     */
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    /**
     * Get idProduit
     *
     * @return int
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }
    /**
     * Set qte
     *
     * @param integer $qte
     *
     * @return Lignecommande
     */
    public function setQte($qte)
    {
        $this->qte = $qte;

        return $this;
    }

    /**
     * Get qte
     *
     * @return int
     */
    public function getQte()
    {
        return $this->qte;
    }
}

