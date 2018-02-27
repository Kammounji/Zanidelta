<?php

namespace Veterinaire\GestionRDVBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notification
 *
 * @ORM\Table(name="notification")
 * @ORM\Entity(repositoryClass="Veterinaire\GestionRDVBundle\Repository\NotificationRepository")
 */
class Notification
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
     * @ORM\Column(name="notification", type="string", length=255)
     */
    private $notification;


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
     * @var
     *
     * @ORM\ManyToOne(targetEntity="MyApp\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="id_client", referencedColumnName="id")
     */

    private $idClient;

    /**
     * .
     * @ORM\OneToOne(targetEntity="Rdv_veterinaire")
     * @ORM\JoinColumn(name="idRdv", referencedColumnName="id",nullable=true)
     */
    private $idRdv;

    /**
     * @return mixed
     */
    public function getIdRdv()
    {
        return $this->idRdv;
    }

    /**
     * @param mixed $idRdv
     */
    public function setIdRdv($idRdv)
    {
        $this->idRdv = $idRdv;
    }

    /**
     * @return mixed
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * @param mixed $idClient
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;
    }

    /**
     * Set notification
     *
     * @param string $notification
     *
     * @return Notification
     */
    public function setNotification($notification)
    {
        $this->notification = $notification;

        return $this;
    }

    /**
     * Get notification
     *
     * @return string
     */
    public function getNotification()
    {
        return $this->notification;
    }
}

