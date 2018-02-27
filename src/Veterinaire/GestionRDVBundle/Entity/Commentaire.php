<?php

namespace Veterinaire\GestionRDVBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire")
 * @ORM\Entity(repositoryClass="Veterinaire\GestionRDVBundle\Repository\CommentaireRepository")
 */
class Commentaire
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
     * @param int $id
     */

    /**
     * @var string
     *
     * @ORM\Column(name="id_cible", type="string", length=255)
     */
    private $idCible;

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="string", length=500)
     */
    private $texte;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="temps", type="time")
     */
    private $temps;

    /**
     * @var string
     *
     * @ORM\Column(name="id_client", type="string", length=255)
     */
    private $idClient;


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
     * @return Commentaire
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
     * Set texte
     *
     * @param string $texte
     *
     * @return Commentaire
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Commentaire
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
     * Set temps
     *
     * @param \DateTime $temps
     *
     * @return Commentaire
     */
    public function setTemps($temps)
    {
        $this->temps = $temps;

        return $this;
    }

    /**
     * Get temps
     *
     * @return \DateTime
     */
    public function getTemps()
    {
        return $this->temps;
    }

    /**
     * Set idClient
     *
     * @param string $idClient
     *
     * @return Commentaire
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
}

