<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActContactRepository")
 */
class ActContact
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
    private $contact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ActPerson", inversedBy="actContact", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $person;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ActUser", inversedBy="actContact", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId()
    {
        return $this->id;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPerson(): ?ActPerson
    {
        return $this->person;
    }

    public function setPerson(ActPerson $person): self
    {
        $this->person = $person;

        return $this;
    }

    public function getUser(): ?ActUser
    {
        return $this->user;
    }

    public function setUser(ActUser $user): self
    {
        $this->user = $user;

        return $this;
    }
}
