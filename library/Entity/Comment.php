<?php
namespace Entity;

use Entity\User,
    InvalidArgumentException,
    Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity 
 */
class Comment
{
    
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $content;
    
    /**
     * @ORM\ManyToOne(targetEntity="Entity\User", inversedBy="comments")
     * @var User|null
     */
    private $user;
    
    public function __construct($content) {
        $this->setContent($content);
    }
    
    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * @return string
     */
    public function getContent() {
        return $this->content;
    }
    
    /**
     * @param string $content
     */
    public function setContent($content) {
        $this->content = (string) $content;
    }
    
    /**
     * @return User|null
     */
    public function getUser() {
        return $this->user;
    }
    
    /**
     * @param User $user
     */
    public function setUser($user) {
        if($user === null || $user instanceof User) {
            $this->user = $user;
        } else {
            throw new InvalidArgumentException('$user must be instance of Entity\User or null!');
        }
    }

}