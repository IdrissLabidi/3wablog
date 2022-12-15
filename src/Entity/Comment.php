<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    
    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $content = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Post $post = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $User = null;


    public function __construct()
    {
        // $this->setCreatedAt(new DateTimeImmutable());
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }


    /**
     * Get the value of post
     */ 
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set the value of post
     *
     * @return  self
     */ 
    public function setPost($post)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get the value of User
     */ 
    public function getUser()
    {
        return $this->User;
    }

    /**
     * Set the value of User
     *
     * @return  self
     */ 
    public function setUser($User)
    {
        $this->User = $User;

        return $this;
    }
}
