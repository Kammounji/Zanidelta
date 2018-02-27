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
     * @ORM\Column(name="etat", type="integer")
     */
    private $etat;

    /**
     * @var int
     *
     * @ORM\Column(name="id_client", type="integer")
     */
    private $idClient;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_tot", type="float")
     */
    private $prixTot;

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
     * Set etat
     *
     * @param integer $etat
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
     * @return int
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set idClient
     *
     * @param integer $idClient
     *
     * @return Commande
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
     * Set prixTot
     *
     * @param float $prixTot
     *
     * @return Commande
     */
    public function setPrixTot($prixTot)
    {
        $this->prixTot = $prixTot;

        return $this;
    }

    /**
     * Get prixTot
     *
     * @return float
     */
    public function getPrixTot()
    {
        return $this->prixTot;
    }
}

