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
     * @var int
     *
     * @ORM\Column(name="id_client", type="integer")
     */
    private $idClient;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_association", type="string", length=255)
     */
    private $nomAssociation;

    /**
     * @return int
     */
    public function getNomAssociation()
    {
        return $this->nomAssociation;
    }

    /**
     * @param int $nomAssociation
     */
    public function setNomAssociation($nomAssociation)
    {
        $this->nomAssociation = $nomAssociation;
    }






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
     * @param int $idClient
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
     * @return int
     */
    public function getIdClient()
    {
        return $this->idClient;
    }


}

