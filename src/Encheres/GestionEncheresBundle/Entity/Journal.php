<?php

namespace Encheres\GestionEncheresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Journal
 *
 * @ORM\Table(name="journal")
 * @ORM\Entity(repositoryClass="Encheres\GestionEncheresBundle\Repository\JournalRepository")
 */
class Journal
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
     * @ORM\Column(name="id_session", type="string", length=255)
     */
    private $idSession;

    /**
     * @var string
     *
     * @ORM\Column(name="id_client", type="string", length=255)
     */
    private $idClient;

    /**
     * @var float
     *
     * @ORM\Column(name="mise", type="float")
     */
    private $mise;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_mise", type="time")
     */
    private $dateMise;


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
     * Set idSession
     *
     * @param string $idSession
     *
     * @return Journal
     */
    public function setIdSession($idSession)
    {
        $this->idSession = $idSession;

        return $this;
    }

    /**
     * Get idSession
     *
     * @return string
     */
    public function getIdSession()
    {
        return $this->idSession;
    }

    /**
     * Set idClient
     *
     * @param string $idClient
     *
     * @return Journal
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
     * Set mise
     *
     * @param float $mise
     *
     * @return Journal
     */
    public function setMise($mise)
    {
        $this->mise = $mise;

        return $this;
    }

    /**
     * Get mise
     *
     * @return float
     */
    public function getMise()
    {
        return $this->mise;
    }

    /**
     * Set dateMise
     *
     * @param \DateTime $dateMise
     *
     * @return Journal
     */
    public function setDateMise($dateMise)
    {
        $this->dateMise = $dateMise;

        return $this;
    }

    /**
     * Get dateMise
     *
     * @return \DateTime
     */
    public function getDateMise()
    {
        return $this->dateMise;
    }
}

