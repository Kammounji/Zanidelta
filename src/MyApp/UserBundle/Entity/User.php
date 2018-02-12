<?php
namespace MyApp\UserBundle \Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateur")
 */
class User extends BaseUser
{
/**
 * @ORM\Id
 * @ORM\Column(type="integer")
 * @ORM\GeneratedValue(strategy="AUTO")
 */
protected $id;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $Adresse
     */
    public function setAdresse($Adresse)
    {
        $this->adresse = $Adresse;
    }

    /**
     * @ORM\Column(type="string",length=255)
     *
     */
     protected $nom;
    /**
     * @ORM\Column(type="string",length=255)
     *
     */
    protected $prenom;

    /**
     * @ORM\Column(type="string",length=255)
     *
     */
    protected $adresse;
}