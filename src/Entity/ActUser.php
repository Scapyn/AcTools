<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * @ORM\Table(name="act_user")
 * @ORM\Entity(repositoryClass="App\Repository\ActUserRepository")
 */
class ActUser implements AdvancedUserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=25, nullable=true, unique=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=254, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="array", length=254)
     */
    private $roles;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ActPerson", mappedBy="actUsers")
     */
    private $actPersons;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ActDocument", mappedBy="actUsers")
     */
    private $actDocuments;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ActContact", mappedBy="user", cascade={"persist", "remove"})
     */
    private $actContact;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ActMail", mappedBy="user")
     */
    private $actMails;

    public function __construct()
    {
        $this->isActive = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid('', true));
        $this->roles = array('ROLE_USER');
        $this->actPersons = new ArrayCollection();
        $this->actDocuments = new ArrayCollection();
        $this->actMails = new ArrayCollection();
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getDateCreation(): ?string
    {
        return $this->dateCreation;
    }

    public function setDateCreation(?string $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }
    
    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }
    
    public function getRoles()
    {
        return $this->roles;
    }
    
    public function eraseCredentials()
    {
    }
  
    public function isAccountNonExpired()
    {
        return true;
    }
    
    public function isAccountNonLocked()
    {
        return true;
    }
    
    public function isCredentialsNonExpired()
    {
        return true;
    }
    
    public function isEnabled()
    {
        return $this->isActive;
    }
        
    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
            $this->isActive,
            $this->email,
        ));
    }
    
    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            $this->isActive,
            $this->email,
        ) = unserialize($serialized);
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return Collection|ActPerson[]
     */
    public function getActPersons(): Collection
    {
        return $this->actPersons;
    }

    public function addActPerson(ActPerson $actPerson): self
    {
        if (!$this->actPersons->contains($actPerson)) {
            $this->actPersons[] = $actPerson;
            $actPerson->addactUsers($this);
        }

        return $this;
    }

    public function removeActPerson(ActPerson $actPerson): self
    {
        if ($this->actPersons->contains($actPerson)) {
            $this->actPersons->removeElement($actPerson);
            $actPerson->removeactUsers($this);
        }

        return $this;
    }

    /**
     * @return Collection|ActDocument[]
     */
    public function getActDocuments(): Collection
    {
        return $this->actDocuments;
    }

    public function addActDocument(ActDocument $actDocument): self
    {
        if (!$this->actDocuments->contains($actDocument)) {
            $this->actDocuments[] = $actDocument;
            $actDocument->setActUsers($this);
        }

        return $this;
    }

    public function removeActDocument(ActDocument $actDocument): self
    {
        if ($this->actDocuments->contains($actDocument)) {
            $this->actDocuments->removeElement($actDocument);
            // set the owning side to null (unless already changed)
            if ($actDocument->getActUsers() === $this) {
                $actDocument->setActUsers(null);
            }
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
        if ($this !== $actContact->getUser()) {
            $actContact->setUser($this);
        }

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
            $actMail->setUser($this);
        }

        return $this;
    }

    public function removeActMail(ActMail $actMail): self
    {
        if ($this->actMails->contains($actMail)) {
            $this->actMails->removeElement($actMail);
            // set the owning side to null (unless already changed)
            if ($actMail->getUser() === $this) {
                $actMail->setUser(null);
            }
        }

        return $this;
    }
}
