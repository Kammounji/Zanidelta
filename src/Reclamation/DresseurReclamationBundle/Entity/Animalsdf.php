<?php

namespace Reclamation\DresseurReclamationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Animalsdf
 *
 * @ORM\Table(name="animalsdf")
 * @ORM\Entity(repositoryClass="Reclamation\DresseurReclamationBundle\Repository\AnimalsdfRepository")
 */
class Animalsdf
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
     * @ORM\Column(name="sexe", type="string", length=255)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="url_img", type="string", length=255)
     */
    private $urlImg;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_trouvaille", type="date")
     */
    private $dateTrouvaille;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_trouvaille", type="string", length=255)
     */
    private $lieuTrouvaille;


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
     * @return Animalsdf
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
     * Set sexe
     *
     * @param string $sexe
     *
     * @return Animalsdf
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
     * Set urlImg
     *
     * @param string $urlImg
     *
     * @return Animalsdf
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
     * Set dateTrouvaille
     *
     * @param \DateTime $dateTrouvaille
     *
     * @return Animalsdf
     */
    public function setDateTrouvaille($dateTrouvaille)
    {
        $this->dateTrouvaille = $dateTrouvaille;

        return $this;
    }

    /**
     * Get dateTrouvaille
     *
     * @return \DateTime
     */
    public function getDateTrouvaille()
    {
        return $this->dateTrouvaille;
    }

    /**
     * Set lieuTrouvaille
     *
     * @param string $lieuTrouvaille
     *
     * @return Animalsdf
     */
    public function setLieuTrouvaille($lieuTrouvaille)
    {
        $this->lieuTrouvaille = $lieuTrouvaille;

        return $this;
    }

    /**
     * Get lieuTrouvaille
     *
     * @return string
     */
    public function getLieuTrouvaille()
    {
        return $this->lieuTrouvaille;
    }
}

