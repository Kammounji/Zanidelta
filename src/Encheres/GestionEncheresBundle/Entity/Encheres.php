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
     * @ORM\Column(name="date_debut", type="datetime")
     */
    private $dateDebut;

    /**
     * @var string
     *
     * @ORM\Column(name="seuil_mise", type="decimal", precision=10, scale=0)
     */
    private $seuilMise;

    /**
     * @var int
     *
     * @ORM\Column(name="seuil_participants", type="integer")
     */
    private $seuilParticipants;


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
     * @param string $seuilMise
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
     * @return string
     */
    public function getSeuilMise()
    {
        return $this->seuilMise;
    }

    /**
     * Set seuilParticipants
     *
     * @param int $seuilParticipants
     *
     * @return Encheres
     */
    public function setSeuilParticipants($seuilParticipants)
    {
        $this->seuilParticipants = $seuilParticipants;

        return $this;
    }

    /**
     * Get seuilParticipants
     *
     * @return int
     */
    public function getSeuilParticipants()
    {
        return $this->seuilParticipants;
    }
}
