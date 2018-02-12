<?php

namespace Transactions\GestionCommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wallet
 *
 * @ORM\Table(name="wallet")
 * @ORM\Entity(repositoryClass="Transactions\GestionCommandeBundle\Repository\WalletRepository")
 */
class Wallet
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
     * @var float
     *
     * @ORM\Column(name="Budget", type="float")
     */
    private $budget;

    /**
     * @var string
     *
     * @ORM\Column(name="devise", type="string", length=30)
     */
    private $devise;

    /**
     * @var int
     *
     * @ORM\Column(name="jetons", type="integer")
     */
    private $jetons;


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
     * @return Wallet
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
     * Set budget
     *
     * @param float $budget
     *
     * @return Wallet
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return float
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set devise
     *
     * @param string $devise
     *
     * @return Wallet
     */
    public function setDevise($devise)
    {
        $this->devise = $devise;

        return $this;
    }

    /**
     * Get devise
     *
     * @return string
     */
    public function getDevise()
    {
        return $this->devise;
    }

    /**
     * Set jetons
     *
     * @param integer $jetons
     *
     * @return Wallet
     */
    public function setJetons($jetons)
    {
        $this->jetons = $jetons;

        return $this;
    }

    /**
     * Get jetons
     *
     * @return int
     */
    public function getJetons()
    {
        return $this->jetons;
    }
}

