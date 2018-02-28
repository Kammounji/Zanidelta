<?php

namespace Store\GestionProduitsBundle\Entity;
use Mgilet\NotificationBundle\Annotation\Notifiable;
use Mgilet\NotificationBundle\NotifiableInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="Store\GestionProduitsBundle\Repository\ProduitRepository")
 * @Notifiable(name="produit")
 */
class Produit implements NotifiableInterface
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
     * @var \Association\GestionAssociationBundle\Entity\Categorie
     *
     * @ORM\ManyToOne(targetEntity="\Association\GestionAssociationBundle\Entity\Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="	id_categorie", referencedColumnName="id")
     * })
     */
    private $idCategorie;


    /**
     * @var int
     *
     * @ORM\Column(name="id_propietaire", type="integer",)
     */
    private $idPropietaire;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer",)
     */
    private $quantite;

    /**
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param int $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="caracteristiques", type="string", length=400)
     */
    private $caracteristiques;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=400)
     */
    private $etat;

    /**
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1000)
     */
    private $description;



    /**
     * @var float
     *
     * @ORM\Column(name="poid", type="float")
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
     * Set poid
     *
     * @param float $poid
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
     * @return float
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
     * @return int
     */
    public function getIdPropietaire()
    {
        return $this->idPropietaire;
    }

    /**
     * @param int $idPropietaire
     */
    public function setIdPropietaire($idPropietaire)
    {
        $this->idPropietaire = $idPropietaire;
    }

    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    public $nomImage;
    /**
     * @Assert\File(maxSize="500k")
     */
    public $file;
    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    public function getAbsolutePath()
    {
        return null === $this->nomImage
            ? null
            : $this->getUploadRootDir().'/'.$this->nomImage;
    }

    public function getWebPath()
    {
        return null === $this->nomImage
            ? null
            : $this->getUploadDir().'/'.$this->nomImage;
    }

    protected function getUploadRootDir(){
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    protected function getUploadDir(){
        return 'uploads';
    }
    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->getFile()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->nomImage = $this->getFile()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }

    /**
     * Set nomImage
     *
     * @param string $nomImage
     *
     * @return Produit
     */
    public function setNomImage($nomImage){
        $this->nomImage=$nomImage;
        return $this;
    }

    /**
     * Get nomImage
     *
     * @return string
     */
    public function getNomImage(){
        return $this->nomImage;
    }
}

