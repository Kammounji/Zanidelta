<?php

namespace Association\GestionAssociationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participation
 *
 * @ORM\Table(name="participation")
 * @ORM\Entity(repositoryClass="Association\GestionAssociationBundle\Repository\ParticipationRepository")
 */
class Participation
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
     * @ORM\Column(name="id_client", type="integer")
     */

    public $id_client;

    /**
     * @return int
     */
    public function getIdClient()
    {
        return $this->id_client;
    }

    /**
     * @param int $id_client
     */
    public function setIdClient($id_client)
    {
        $this->id_client = $id_client;
    }



    /**
     * @var \Association\GestionAssociationBundle\Entity\Evenement
     *
     * @ORM\ManyToOne(targetEntity="Association\GestionAssociationBundle\Entity\Evenement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_evenement", referencedColumnName="id")
     * })
     */
    public $id_evenement;


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
     * @return int
     */
    public function getIdEvenement()
    {
        return $this->id_evenement;
    }

    /**
     * @param int $id_evenement
     */
    public function setIdEvenement($id_evenement)
    {
        $this->id_evenement = $id_evenement;
    }

}

