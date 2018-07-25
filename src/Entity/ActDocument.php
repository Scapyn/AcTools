<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActDocumentRepository")
 */
class ActDocument
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
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ActUser", inversedBy="actDocuments")
     */
    private $actUsers;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ActMail", mappedBy="documents")
     */
    private $actMails;

    public function __construct()
    {
        $this->actMails = new ArrayCollection();
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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

    public function getActUsers(): ?ActUser
    {
        return $this->actUsers;
    }

    public function setActUsers(?ActUser $actUsers): self
    {
        $this->actUsers = $actUsers;

        return $this;
    }

    /**
     * @return Collection|ActMail[]
     */
    public function getActMails(): Collection
    {
        return $this->actMails;
    }

    public function addActMail(ActMail $actMail): self
    {
        if (!$this->actMails->contains($actMail)) {
            $this->actMails[] = $actMail;
            $actMail->addDocument($this);
        }

        return $this;
    }

    public function removeActMail(ActMail $actMail): self
    {
        if ($this->actMails->contains($actMail)) {
            $this->actMails->removeElement($actMail);
            $actMail->removeDocument($this);
        }

        return $this;
    }
}
