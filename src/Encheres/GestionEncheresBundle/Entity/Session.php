<?php

namespace Encheres\GestionEncheresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Session
 *
 * @ORM\Table(name="session")
 * @ORM\Entity(repositoryClass="Encheres\GestionEncheresBundle\Repository\SessionRepository")
 */
class Session
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Encheres\GestionEncheresBundle\Entity\Encheres", mappedBy="id")
     * @ORM\OneToMany(targetEntity="Encheres\GestionEncheresBundle\Entity\Journal", mappedBy="id_session")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * @var float
     *
     * @ORM\Column(name="derniere_mise", type="float")
     */
    private $derniereMise;

    /**
     * @var string
     *
     * @ORM\Column(name="id_gagnant", type="string", length=255)
     */
    private $idGagnant;


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
     * Set id
     *
     * @param integer $id
     *
     * @return Session
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Session
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set derniereMise
     *
     * @param float $derniereMise
     *
     * @return Session
     */
    public function setDerniereMise($derniereMise)
    {
        $this->derniereMise = $derniereMise;

        return $this;
    }

    /**
     * Get derniereMise
     *
     * @return float
     */
    public function getDerniereMise()
    {
        return $this->derniereMise;
    }

    /**
     * Set idGagnant
     *
     * @param string $idGagnant
     *
     * @return Session
     */
    public function setIdGagnant($idGagnant)
    {
        $this->idGagnant = $idGagnant;

        return $this;
    }

    /**
     * Get idGagnant
     *
     * @return string
     */
    public function getIdGagnant()
    {
        return $this->idGagnant;
    }

}
