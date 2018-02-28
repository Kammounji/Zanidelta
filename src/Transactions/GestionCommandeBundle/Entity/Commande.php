<?php

namespace Transactions\GestionCommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="Transactions\GestionCommandeBundle\Repository\CommandeRepository")
 */
class Commande
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
     * @ORM\Column(name="nbr_totale", type="integer")
     */
    private $nbrTotale;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_totale", type="float")
     */
    private $prixTotale;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

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
     * Set nbrTotale
     *
     * @param integer $nbrTotale
     *
     * @return Commande
     */
    public function setNbrTotale($nbrTotale)
    {
        $this->nbrTotale = $nbrTotale;

        return $this;
    }

    /**
     * Get nbrTotale
     *
     * @return int
     */
    public function getNbrTotale()
    {
        return $this->nbrTotale;
    }

    /**
     * Set prixTotale
     *
     * @param float $prixTotale
     *
     * @return Commande
     */
    public function setPrixTotale($prixTotale)
    {
        $this->prixTotale = $prixTotale;

        return $this;
    }

    /**
     * Get prixTotale
     *
     * @return float
     */
    public function getPrixTotale()
    {
        return $this->prixTotale;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Commande
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     *
     * @return Commande
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

