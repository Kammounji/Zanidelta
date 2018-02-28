<?php

namespace Association\GestionAssociationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity(repositoryClass="Association\GestionAssociationBundle\Repository\EvenementRepository")
 */
class Evenement
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
     * @ORM\Column(name="id_association", type="string", length=255)
     */
    private $idAssociation;

    /**
     * @var string
     *
     * @ORM\Column(name="id_categorie", type="string", length=255)
     */
    private $idCategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=600)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_participants", type="integer")
     */
    private $nbrParticipants;

    /**
     * @var string
     *
     * @ORM\Column(name="url_img", type="string", length=255)
     */
    private $urlImg;

    /**
     * @var int
     *
     * @ORM\Column(name="prix_nouv", type="integer")
     */
    private $prixNouv;

    /**
     * @var int
     *
     * @ORM\Column(name="prix_ancien", type="integer")
     */
    private $prixAncien;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="datetime")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="datetime")
     */
    private $dateFin;


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
     * Set idAssociation
     *
     * @param string $idAssociation
     *
     * @return Evenement
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
     * Set idCategorie
     *
     * @param string $idCategorie
     *
     * @return Evenement
     */
    public function setIdCategorie($idCategorie)
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }

    /**
     * Get idCategorie
     *
     * @return string
     */
    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Evenement
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Evenement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set nbrParticipants
     *
     * @param string $nbrParticipants
     *
     * @return Evenement
     */
    public function setNbrParticipants($nbrParticipants)
    {
        $this->nbrParticipants = $nbrParticipants;

        return $this;
    }

    /**
     * Get nbrParticipants
     *
     * @return string
     */
    public function getNbrParticipants()
    {
        return $this->nbrParticipants;
    }

    /**
     * Set urlImg
     *
     * @param string $urlImg
     *
     * @return Evenement
     */
    public function setUrlImg($urlImg)
    {
        $this->urlImg = $urlImg;

        return $this;
    }

    /**
     * Get urlImg
     *
     * @return string
     */
    public function getUrlImg()
    {
        return $this->urlImg;
    }

    /**
     * Set prixNouv
     *
     * @param integer $prixNouv
     *
     * @return Evenement
     */
    public function setPrixNouv($prixNouv)
    {
        $this->prixNouv = $prixNouv;

        return $this;
    }

    /**
     * Get prixNouv
     *
     * @return int
     */
    public function getPrixNouv()
    {
        return $this->prixNouv;
    }

    /**
     * Set prixAncien
     *
     * @param integer $prixAncien
     *
     * @return Evenement
     */
    public function setPrixAncien($prixAncien)
    {
        $this->prixAncien = $prixAncien;

        return $this;
    }

    /**
     * Get prixAncien
     *
     * @return int
     */
    public function getPrixAncien()
    {
        return $this->prixAncien;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Evenement
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
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Evenement
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }
}

