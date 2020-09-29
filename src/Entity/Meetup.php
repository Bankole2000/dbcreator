<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * The most generic type of item.
 *
 * @see http://schema.org/Thing Documentation on Schema.org
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/Thing")
 */
class Meetup
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
    private $title;

    /**
     * @var string|null a description of the item
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/description")
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $location;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $dateAndTime;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $imageIsUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $imageUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $themeColor;

    /**
     * @var User|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinTable(name="postedMeetups")
     */
    private $postedBy;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="meetups")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

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

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setLocation(?string $location): void
    {
        $this->location = $location;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setDateAndTime(?string $dateAndTime): void
    {
        $this->dateAndTime = $dateAndTime;
    }

    public function getDateAndTime(): ?string
    {
        return $this->dateAndTime;
    }

    public function setImageIsUrl(?string $imageIsUrl): void
    {
        $this->imageIsUrl = $imageIsUrl;
    }

    public function getImageIsUrl(): ?string
    {
        return $this->imageIsUrl;
    }

    public function setImageUrl(?string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setThemeColor(?string $themeColor): void
    {
        $this->themeColor = $themeColor;
    }

    public function getThemeColor(): ?string
    {
        return $this->themeColor;
    }

    public function setPostedBy(?User $postedBy): void
    {
        $this->postedBy = $postedBy;
    }

    public function getPostedBy(): ?User
    {
        return $this->postedBy;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }
}
