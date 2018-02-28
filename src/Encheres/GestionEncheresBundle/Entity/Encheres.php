<?php

namespace Encheres\GestionEncheresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Encheres
 *
 * @ORM\Table(name="encheres")
 * @ORM\Entity(repositoryClass="Encheres\GestionEncheresBundle\Repository\EncheresRepository")
 */
class Encheres
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_encheres", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_encheres;

    /**
     * @var string
     *
     * @ORM\Column(name="id_cible", type="string", length=255, unique=true)
     * @ORM\OneToOne(targetEntity="Store\GestionProduitsBundle\Entity\Produit", mappedBy="id")
     */
    private $idCible;

    /**
     * @var string
     *
     * @ORM\Column(name="id_proprietaire", type="string", length=255)
     * @ORM\ManyToOne(targetEntity="MyApp\UserBundle\Entity\User", inversedBy="id")
     * @ORM\JoinColumn(nullable=true)
     */
    private $idProprietaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="datetime")
     */
    private $dateDebut;

    /**
     * @var float
     *
     * @ORM\Column(name="seuil_mise", type="float")
     */
    private $seuilMise;


    /**
     * Get id_encheres
     *
     * @return int
     */
    public function getId_Encheres()
    {
        return $this->id_encheres;
    }

    /**
     * Set idCible
     *
     * @param string $idCible
     *
     * @return Encheres
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
     * @return Encheres
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
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Encheres
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set seuilMise
     *
     * @param float $seuilMise
     *
     * @return Encheres
     */
    public function setSeuilMise($seuilMise)
    {
        $this->seuilMise = $seuilMise;

        return $this;
    }

    /**
     * Get seuilMise
     *
     * @return float
     */
    public function getSeuilMise()
    {
        return $this->seuilMise;
    }

}
