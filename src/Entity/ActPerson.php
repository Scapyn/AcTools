<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActPersonRepository")
 */

class ActPerson
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
     * @ORM\Column(type="boolean")
     */
    private $isHuman;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $job;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ActUser", inversedBy="actPersons")
     */
    private $actUsers;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ActContact", mappedBy="person", cascade={"persist", "remove"})
     */
    private $actContact;

    public function __construct()
    {
        $this->actUsers = new ArrayCollection();
    }

    public function getId()
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

    public function getIsHuman(): ?bool
    {
        return $this->isHuman;
    }

    public function setIsHuman(bool $isHuman): self
    {
        $this->isHuman = $isHuman;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getJob(): ?array
    {
        return $this->job;
    }

    public function setJob(?array $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return Collection|ActUser[]
     */
    public function getactUsers(): Collection
    {
        return $this->actUsers;
    }

    public function addactUsers(ActUser $actUsers): self
    {
        if (!$this->actUsers->contains($actUsers)) {
            $this->actUsers[] = $actUsers;
        }

        return $this;
    }

    public function removeactUsers(ActUser $actUsers): self
    {
        if ($this->actUsers->contains($actUsers)) {
            $this->actUsers->removeElement($actUsers);
        }

        return $this;
    }

    public function getActContact(): ?ActContact
    {
        return $this->actContact;
    }

    public function setActContact(ActContact $actContact): self
    {
        $this->actContact = $actContact;

        // set the owning side of the relation if necessary
        if ($this !== $actContact->getPerson()) {
            $actContact->setPerson($this);
        }

        return $this;
    }
}
