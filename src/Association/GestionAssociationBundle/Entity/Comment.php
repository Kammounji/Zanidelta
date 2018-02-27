<?php
/**
 * Created by PhpStorm.
 * User: iheb bf
 * Date: 2/24/2018
 * Time: 5:50 PM
 */

namespace Association\GestionAssociationBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use FOS\CommentBundle\Entity\Comment as BaseComment;


/**
 * @ORM\Entity
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class Comment extends BaseComment
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Thread of this comment
     *
     * @var Thread
     * @ORM\ManyToOne(targetEntity="Association\GestionAssociationBundle\Entity\Thread")
     */
    protected $thread;
}