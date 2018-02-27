<?php

namespace Association\GestionAssociationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adherents
 *
 * @ORM\Table(name="adherents")
 * @ORM\Entity(repositoryClass="Association\GestionAssociationBundle\Repository\AdherentsRepository")
 */
class Adherents
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
     * @ORM\Column(name="id_wallet", type="string", length=255)
     */
    private $idWallet;

    /**
     * @var string
     *
     * @ORM\Column(name="id_client", type="string", length=255)
     */
    private $idClient;

    /**
     * @var string
     *
     * @ORM\Column(name="id_association", type="string", length=255)
     */
    private $idAssociation;

    /**
     * @var int
     *
     * @ORM\Column(name="dons", type="integer")
     */
    private $dons;

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
     * Set idWallet
     *
     * @param string $idWallet
     *
     * @return Adherents
     */
    public function setIdWallet($idWallet)
    {
        $this->idWallet = $idWallet;

        return $this;
    }

    /**
     * Get idWallet
     *
     * @return string
     */
    public function getIdWallet()
    {
        return $this->idWallet;
    }

    /**
     * Set idClient
     *
     * @param string $idClient
     *
     * @return Adherents
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
     * Set idAssociation
     *
     * @param string $idAssociation
     *
     * @return Adherents
     */
    public function setIdAssociation($idAssociation)
    {
        $this->idAssociation = $idAssociation;

        return $this;
    }

    /**
     * Get idAssociation
     *
     * @return string
     */
    public function getIdAssociation()
    {
        return $this->idAssociation;
    }

    /**
     * Set dons
     *
     * @param integer $dons
     *
     * @return Adherents
     */
    public function setDons($dons)
    {
        $this->dons = $dons;

        return $this;
    }

    /**
     * Get dons
     *
     * @return int
     */
    public function getDons()
    {
        return $this->dons;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     *
     * @return Adherents
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

