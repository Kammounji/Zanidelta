<?php

namespace Store\GestionProduitsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Store
 *
 * @ORM\Table(name="store")
 * @ORM\Entity(repositoryClass="Store\GestionProduitsBundle\Repository\StoreRepository")
 */
class Store
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
     * @ORM\Column(name="id_cible", type="string", length=255)
     */
    private $idCible;

    /**
     * @var string
     *
     * @ORM\Column(name="id_proprietaire", type="string", length=255)
     */
    private $idProprietaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout", type="datetime")
     */
    private $dateAjout;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;


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
     * Set idCible
     *
     * @param string $idCible
     *
     * @return Store
     */
    public function setIdCible($idCible)
    {
        $this->idCible = $idCible;

        return $this;
    }

    /**
     * Get idCible
     *
     * @return string
     */
    public function getIdCible()
    {
        return $this->idCible;
    }

    /**
     * Set idProprietaire
     *
     * @param string $idProprietaire
     *
     * @return Store
     */
    public function setIdProprietaire($idProprietaire)
    {
        $this->idProprietaire = $idProprietaire;

        return $this;
    }

    /**
     * Get idProprietaire
     *
     * @return string
     */
    public function getIdProprietaire()
    {
        return $this->idProprietaire;
    }

    /**
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     *
     * @return Store
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

    /**
     * Get dateAjout
     *
     * @return \DateTime
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Store
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

}

