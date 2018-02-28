<?php

namespace Reclamation\DresseurReclamationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Animalperdu
 *
 * @ORM\Table(name="animalperdu")
 * @ORM\Entity(repositoryClass="Reclamation\DresseurReclamationBundle\Repository\AnimalperduRepository")
 */
class Animalperdu
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
     * @ORM\Column(name="id_animal", type="string", length=255)
     */
    private $idAnimal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_disparition", type="date")
     */
    private $dateDisparition;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_disparition", type="string", length=255)
     */
    private $lieuDisparition;

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
     * Set idAnimal
     *
     * @param string $idAnimal
     *
     * @return Animalperdu
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
     * Set dateDisparition
     *
     * @param \DateTime $dateDisparition
     *
     * @return Animalperdu
     */
    public function setDateDisparition($dateDisparition)
    {
        $this->dateDisparition = $dateDisparition;

        return $this;
    }

    /**
     * Get dateDisparition
     *
     * @return \DateTime
     */
    public function getDateDisparition()
    {
        return $this->dateDisparition;
    }

    /**
     * Set lieuDisparition
     *
     * @param string $lieuDisparition
     *
     * @return Animalperdu
     */
    public function setLieuDisparition($lieuDisparition)
    {
        $this->lieuDisparition = $lieuDisparition;

        return $this;
    }

    /**
     * Get lieuDisparition
     *
     * @return string
     */
    public function getLieuDisparition()
    {
        return $this->lieuDisparition;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     *
     * @return Animalperdu
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

