<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * The most generic type of item.
 *
 * @see http://schema.org/Thing Documentation on Schema.org
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/Thing")
 */
class User
{
    /**
     * @var int|null
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $uuid;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $firstname;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $lastname;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $password;

    /**
     * @var Collection<Meetup>|null
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Meetup")
     * @ORM\JoinTable(name="registeredMeetups", inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     */
    private $registeredMeetups;

    /**
     * @ORM\OneToMany(targetEntity=Meetup::class, mappedBy="owner", orphanRemoval=true)
     */
    private $meetups;

    public function __construct()
    {
        $this->registeredMeetups = new ArrayCollection();
        $this->meetups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setUuid(?string $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setFirstname(?string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setLastname(?string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function addRegisteredMeetup(Meetup $registeredMeetup): void
    {
        $this->registeredMeetups[] = $registeredMeetup;
    }

    public function removeRegisteredMeetup(Meetup $registeredMeetup): void
    {
        $this->registeredMeetups->removeElement($registeredMeetup);
    }

    public function getRegisteredMeetups(): Collection
    {
        return $this->registeredMeetups;
    }

    /**
     * @return Collection|Meetup[]
     */
    public function getMeetups(): Collection
    {
        return $this->meetups;
    }

    public function addMeetup(Meetup $meetup): self
    {
        if (!$this->meetups->contains($meetup)) {
            $this->meetups[] = $meetup;
            $meetup->setOwner($this);
        }

        return $this;
    }

    public function removeMeetup(Meetup $meetup): self
    {
        if ($this->meetups->contains($meetup)) {
            $this->meetups->removeElement($meetup);
            // set the owning side to null (unless already changed)
            if ($meetup->getOwner() === $this) {
                $meetup->setOwner(null);
            }
        }

        return $this;
    }
}
