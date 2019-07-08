<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NoteRepository")
 */
class Note
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Accord", mappedBy="notes")
     */
    private $accords;

    public function __construct()
    {
        $this->accords = new ArrayCollection();
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
     * @return Collection|Accord[]
     */
    public function getAccords(): Collection
    {
        return $this->accords;
    }

    public function addAccord(Accord $accord): self
    {
        if (!$this->accords->contains($accord)) {
            $this->accords[] = $accord;
            $accord->addNote($this);
        }

        return $this;
    }

    public function removeAccord(Accord $accord): self
    {
        if ($this->accords->contains($accord)) {
            $this->accords->removeElement($accord);
            $accord->removeNote($this);
        }

        return $this;
    }
}
