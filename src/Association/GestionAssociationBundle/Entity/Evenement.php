<?php

namespace Association\GestionAssociationBundle\Entity;

use MyApp\UserBundle\Entity\User;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
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
     * @var \Association\GestionAssociationBundle\Entity\Categorie
     *
     * @ORM\ManyToOne(targetEntity="Association\GestionAssociationBundle\Entity\Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_categorie", referencedColumnName="id")
     * })
     */
    public $id_categorie;


    /**
     * @var int
     *
     * @ORM\Column(name="id_association", type="integer")
     */

    public $id_association;


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
     * @var \DateTime
     *
     * @ORM\Column(name="heure_event", type="time")
     */
    public $heure_event;
    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    public $nom_association;

    /**
     * @return mixed
     */
    public function getNomAssociation()
    {
        return $this->nom_association;
    }

    /**
     * @param mixed $nom_association
     */
    public function setNomAssociation($nom_association)
    {
        $this->nom_association = $nom_association;
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
    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer")
     */
    private $prix;

    /**
     * @return bool
     */
    public function isEtat()
    {
        return $this->etat;
    }

    /**
     * @param bool $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }






    /**
     * @var boolean
     *
     * @ORM\Column(name="etat", type="boolean")
     */
    private $etat;
    /**
     * @var string
     *
     * @ORM\Column(name="date_debut", type="string", length=255)
     */
    private $dateDebut;



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
        $this->id_association = $idAssociation;

        return $this;
    }

    /**
     * @return int
     */
    public function getIdAssociation()
    {
        return $this->id_association;
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
     * @return Categorie
     */
    public function getIdCategorie()
    {
        return $this->id_categorie;
    }

    /**
     * @param Categorie $id_categorie
     */
    public function setIdCategorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;
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
     * @return string
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @return \DateTime
     */
    public function getHeureEvent()
    {
        return $this->heure_event;
    }

    /**
     * @param mixed $heure_event
     */
    public function setHeureEvent($heure_event)
    {
        $this->heure_event = $heure_event;
    }

    /**
     * @param string $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }









    /**
     * @return int
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param int $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
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
        return 'images';
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
     * @return Evenement
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

