<?php

namespace Reclamation\DresseurReclamationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rdv_dresseur
 *
 * @ORM\Table(name="rdv_dresseur")
 * @ORM\Entity(repositoryClass="Reclamation\DresseurReclamationBundle\Repository\Rdv_dresseurRepository")
 */
class Rdv_dresseur
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
     * @ORM\Column(name="id_client", type="string", length=255)
     */
    private $idClient;

    /**
     * @var string
     *
     * @ORM\Column(name="coordonnees", type="string", length=255)
     */
    private $coordonnees;

    /**
     * @var string
     *
     * @ORM\Column(name="id_animal", type="string", length=255)
     */
    private $idAnimal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_rdv", type="datetime")
     */
    private $dateRdv;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="duree_seance", type="time")
     */
    private $dureeSeance;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var bool
     *
     * @ORM\Column(name="etat", type="boolean")
     */
    private $etat;

    /**
     * @var float
     *
     * @ORM\Column(name="frais_deplacement", type="float")
     */
    private $fraisDeplacement;


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
     * @param string $idClient
     *
     * @return Rdv_dresseur
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
     * Set coordonnees
     *
     * @param string $coordonnees
     *
     * @return Rdv_dresseur
     */
    public function setCoordonnees($coordonnees)
    {
        $this->coordonnees = $coordonnees;

        return $this;
    }

    /**
     * Get coordonnees
     *
     * @return string
     */
    public function getCoordonnees()
    {
        return $this->coordonnees;
    }

    /**
     * Set idAnimal
     *
     * @param string $idAnimal
     *
     * @return Rdv_dresseur
     */
    public function setIdAnimal($idAnimal)
    {
        $this->idAnimal = $idAnimal;

        return $this;
    }

    /**
     * Get idAnimal
     *
     * @return string
     */
    public function getIdAnimal()
    {
        return $this->idAnimal;
    }

    /**
     * Set dateRdv
     *
     * @param \DateTime $dateRdv
     *
     * @return Rdv_dresseur
     */
    public function setDateRdv($dateRdv)
    {
        $this->dateRdv = $dateRdv;

        return $this;
    }

    /**
     * Get dateRdv
     *
     * @return \DateTime
     */
    public function getDateRdv()
    {
        return $this->dateRdv;
    }

    /**
     * Set dureeSeance
     *
     * @param \DateTime $dureeSeance
     *
     * @return Rdv_dresseur
     */
    public function setDureeSeance($dureeSeance)
    {
        $this->dureeSeance = $dureeSeance;

        return $this;
    }

    /**
     * Get dureeSeance
     *
     * @return \DateTime
     */
    public function getDureeSeance()
    {
        return $this->dureeSeance;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Rdv_dresseur
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     *
     * @return Rdv_dresseur
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

    /**
     * Set fraisDeplacement
     *
     * @param float $fraisDeplacement
     *
     * @return Rdv_dresseur
     */
    public function setFraisDeplacement($fraisDeplacement)
    {
        $this->fraisDeplacement = $fraisDeplacement;

        return $this;
    }

    /**
     * Get fraisDeplacement
     *
     * @return float
     */
    public function getFraisDeplacement()
    {
        return $this->fraisDeplacement;
    }
}

