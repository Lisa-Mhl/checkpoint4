<?php

namespace App\Entity;

use App\Repository\BugRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BugRepository::class)
 */
class Bug
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="bugs")
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imgA;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imgB;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imgC;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $resolved;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $stack;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
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

    public function getImgA(): ?string
    {
        return $this->imgA;
    }

    public function setImgA(?string $imgA): self
    {
        $this->imgA = $imgA;

        return $this;
    }

    public function getImgB(): ?string
    {
        return $this->imgB;
    }

    public function setImgB(?string $imgB): self
    {
        $this->imgB = $imgB;

        return $this;
    }

    public function getImgC(): ?string
    {
        return $this->imgC;
    }

    public function setImgC(?string $imgC): self
    {
        $this->imgC = $imgC;

        return $this;
    }

    public function getResolved(): ?bool
    {
        return $this->resolved;
    }

    public function setResolved(bool $resolved): self
    {
        $this->resolved = $resolved;

        return $this;
    }

    public function getStack(): ?string
    {
        return $this->stack;
    }

    public function setStack(string $stack): self
    {
        $this->stack = $stack;

        return $this;
    }
}
