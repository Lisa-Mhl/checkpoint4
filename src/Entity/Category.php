<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Bug::class, mappedBy="category")
     */
    private $bugs;

    public function __toString()
    {
        return $this->getName();
    }

    public function __construct()
    {
        $this->bugs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Bug[]
     */
    public function getBugs(): Collection
    {
        return $this->bugs;
    }

    public function addBug(Bug $bug): self
    {
        if (!$this->bugs->contains($bug)) {
            $this->bugs[] = $bug;
            $bug->setCategory($this);
        }

        return $this;
    }

    public function removeBug(Bug $bug): self
    {
        if ($this->bugs->contains($bug)) {
            $this->bugs->removeElement($bug);
            // set the owning side to null (unless already changed)
            if ($bug->getCategory() === $this) {
                $bug->setCategory(null);
            }
        }

        return $this;
    }
}
