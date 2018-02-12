<?php

namespace Transactions\GestionCommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livraison
 *
 * @ORM\Table(name="livraison")
 * @ORM\Entity(repositoryClass="Transactions\GestionCommandeBundle\Repository\LivraisonRepository")
 */
class Livraison
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
     * @ORM\Column(name="id_commande", type="string", length=255)
     */
    private $idCommande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_livraison", type="date")
     */
    private $dateLivraison;

    /**
     * @var float
     *
     * @ORM\Column(name="frais_livraison", type="float")
     */
    private $fraisLivraison;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_livraison", type="string", length=255)
     */
    private $adresseLivraison;

    /**
     * @var string
     *
     * @ORM\Column(name="id_livreur", type="string", length=255)
     */
    private $idLivreur;

    /**
     * @var string
     *
     * @ORM\Column(name="id_client", type="string", length=255)
     */
    private $idClient;

    /**
     * @var bool
     *
     * @ORM\Column(name="etat", type="boolean")
     */
    private $etat;


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
     * Set idCommande
     *
     * @param string $idCommande
     *
     * @return Livraison
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

    /**
     * Set dateLivraison
     *
     * @param \DateTime $dateLivraison
     *
     * @return Livraison
     */
    public function setDateLivraison($dateLivraison)
    {
        $this->dateLivraison = $dateLivraison;

        return $this;
    }

    /**
     * Get dateLivraison
     *
     * @return \DateTime
     */
    public function getDateLivraison()
    {
        return $this->dateLivraison;
    }

    /**
     * Set fraisLivraison
     *
     * @param float $fraisLivraison
     *
     * @return Livraison
     */
    public function setFraisLivraison($fraisLivraison)
    {
        $this->fraisLivraison = $fraisLivraison;

        return $this;
    }

    /**
     * Get fraisLivraison
     *
     * @return float
     */
    public function getFraisLivraison()
    {
        return $this->fraisLivraison;
    }

    /**
     * Set adresseLivraison
     *
     * @param string $adresseLivraison
     *
     * @return Livraison
     */
    public function setAdresseLivraison($adresseLivraison)
    {
        $this->adresseLivraison = $adresseLivraison;

        return $this;
    }

    /**
     * Get adresseLivraison
     *
     * @return string
     */
    public function getAdresseLivraison()
    {
        return $this->adresseLivraison;
    }

    /**
     * Set idLivreur
     *
     * @param string $idLivreur
     *
     * @return Livraison
     */
    public function setIdLivreur($idLivreur)
    {
        $this->idLivreur = $idLivreur;

        return $this;
    }

    /**
     * Get idLivreur
     *
     * @return string
     */
    public function getIdLivreur()
    {
        return $this->idLivreur;
    }

    /**
     * Set idClient
     *
     * @param string $idClient
     *
     * @return Livraison
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;

        return $this;
    }

    /**
     * Get idClient
     *
     * @return string
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     *
     * @return Livraison
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return bool
     */
    public function getEtat()
    {
        return $this->etat;
    }
}

