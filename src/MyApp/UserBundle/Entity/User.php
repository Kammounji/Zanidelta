<?php
namespace MyApp\UserBundle \Entity;
use Symfony\Component\Validator\Constraints as Assert;
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
     * @ORM\Column(type="string",length=255)
     *
     */
     protected $nom;


    /**
     * @Assert\GreaterThan(0)
     * @ORM\Column(type="integer",nullable=true)
     *
     */
    protected $prixUnitaire;

    /**
     * @return mixed
     */
    public function getPrixUnitaire()
    {
        return $this->prixUnitaire;
    }

    /**
     * @param mixed $prixUnitaire
     */
    public function setPrixUnitaire($prixUnitaire)
    {
        $this->prixUnitaire = $prixUnitaire;
    }
    /**
     * @ORM\Column(type="string",length=255)
     *
     */
    protected $prenom;

    /**
     * @ORM\Column(type="string",length=255)
     *
     */

}