<?php

namespace Veterinaire\GestionRDVBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rdv_veterinaire
 *
 * @ORM\Table(name="rdv_veterinaire")
 * @ORM\Entity(repositoryClass="Veterinaire\GestionRDVBundle\Repository\Rdv_veterinaireRepository")
 */
class Rdv_veterinaire
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
     * @ORM\Column(name="id_vet", type="string", length=255)
     */
    private $idVet;

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
     * @return Rdv_veterinaire
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
     * Set idVet
     *
     * @param string $idVet
     *
     * @return Rdv_veterinaire
     */
    public function setIdVet($idVet)
    {
        $this->idVet = $idVet;

        return $this;
    }

    /**
     * Get idVet
     *
     * @return string
     */
    public function getIdVet()
    {
        return $this->idVet;
    }

    /**
     * Set dateRdv
     *
     * @param \DateTime $dateRdv
     *
     * @return Rdv_veterinaire
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
     * @return Rdv_veterinaire
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
     * @return Rdv_veterinaire
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
     * @return Rdv_veterinaire
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

