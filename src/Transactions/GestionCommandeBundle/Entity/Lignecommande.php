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
     * @var string
     *
     * @ORM\Column(name="id_panier", type="string", length=255)
     */
    private $idPanier;

    /**
     * @var string
     *
     * @ORM\Column(name="id_commande", type="string", length=255)
     */
    private $idCommande;


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
     * Set idPanier
     *
     * @param string $idPanier
     *
     * @return Lignecommande
     */
    public function setIdPanier($idPanier)
    {
        $this->idPanier = $idPanier;

        return $this;
    }

    /**
     * Get idPanier
     *
     * @return string
     */
    public function getIdPanier()
    {
        return $this->idPanier;
    }

    /**
     * Set idCommande
     *
     * @param string $idCommande
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
     * @return string
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }
}

