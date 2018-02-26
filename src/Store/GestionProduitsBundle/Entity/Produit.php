<?php

namespace Store\GestionProduitsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="Store\GestionProduitsBundle\Repository\ProduitRepository")
 */
class Produit
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
     * @ORM\Column(name="id_categorie", type="string", length=255)
     */
    private $idCategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="id_propietaire", type="string", length=255)
     */
    private $idPropietaire;

    /**
     * @var string
     *
     * @ORM\Column(name="caracteristiques", type="string", length=400)
     */
    private $caracteristiques;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1000)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="url_img", type="string", length=255)
     * @Assert\NotBlank(message="Ajouter une image jpg")
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $urlImg;

    /**
     * @var string
     *
     * @ORM\Column(name="poid", type="string" , length=50)
     */
    private $poid;

    /**
     * @var float
     *
     * @ORM\Column(name="vote", type="float")
     */
    private $vote;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_nouv", type="float")
     */
    private $prixNouv;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_ancien", type="float")
     */
    private $prixAncien;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=50)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=50)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="age", type="string" ,length=50)
     */
    private $age;

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
     * Set idCategorie
     *
     * @param string $idCategorie
     *
     * @return Produit
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
     * Set idPropietaire
     *
     * @param string $idPropietaire
     *
     * @return Produit
     */
    public function setIdPropietaire($idPropietaire)
    {
        $this->idPropietaire = $idPropietaire;

        return $this;
    }

    /**
     * Get idPropietaire
     *
     * @return string
     */
    public function getIdPropietaire()
    {
        return $this->idPropietaire;
    }

    /**
     * Set caracteristiques
     *
     * @param string $caracteristiques
     *
     * @return Produit
     */
    public function setCaracteristiques($caracteristiques)
    {
        $this->caracteristiques = $caracteristiques;

        return $this;
    }

    /**
     * Get caracteristiques
     *
     * @return string
     */
    public function getCaracteristiques()
    {
        return $this->caracteristiques;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Produit
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
     * Set urlImg
     *
     * @param string $urlImg
     *
     * @return Produit
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
     * Set poid
     *
     * @param string $poid
     *
     * @return Produit
     */
    public function setPoid($poid)
    {
        $this->poid = $poid;

        return $this;
    }

    /**
     * Get poid
     *
     * @return string
     */
    public function getPoid()
    {
        return $this->poid;
    }

    /**
     * Set vote
     *
     * @param float $vote
     *
     * @return Produit
     */
    public function setVote($vote)
    {
        $this->vote = $vote;

        return $this;
    }

    /**
     * Get vote
     *
     * @return float
     */
    public function getVote()
    {
        return $this->vote;
    }

    /**
     * Set prixNouv
     *
     * @param float $prixNouv
     *
     * @return Produit
     */
    public function setPrixNouv($prixNouv)
    {
        $this->prixNouv = $prixNouv;

        return $this;
    }

    /**
     * Get prixNouv
     *
     * @return float
     */
    public function getPrixNouv()
    {
        return $this->prixNouv;
    }

    /**
     * Set prixAncien
     *
     * @param float $prixAncien
     *
     * @return Produit
     */
    public function setPrixAncien($prixAncien)
    {
        $this->prixAncien = $prixAncien;

        return $this;
    }

    /**
     * Get prixAncien
     *
     * @return float
     */
    public function getPrixAncien()
    {
        return $this->prixAncien;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return animal
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set label
     *
     * @param string $label
     *
     * @return animal
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set age
     *
     * @param string $age
     *
     * @return animal
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }
}

