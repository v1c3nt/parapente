<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $customer;

    /**
     * @ORM\ManyToMany(targetEntity=Article::class, inversedBy="orders",cascade={"persist"})
     */
    private $articles;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $postcode;

    /**
     * @ORM\Column(type="float")
     */
    private $amound;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $phone;

    /**
     * @ORM\Column(type="boolean", options={"default":1})
     */
    private $new = true;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $receivedAt;

    /**
     * @ORM\Column(type="boolean", options={"default":0})
     */
    private $inProgress = false;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $inProgressAt;

    /**
     * @ORM\Column(type="boolean", options={"default":0})
     */
    private $shipped = false;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $shippedAt;

    /**
     * @ORM\Column(type="boolean", options={"default":0})
     */
    private $complete = 0;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $completedAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trackingNumber;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomer(): ?string
    {
        return $this->customer;
    }

    public function setCustomer(string $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        $this->articles->removeElement($article);

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getAmound(): ?string
    {
        return $this->amound;
    }

    public function setAmound(string $amound): self
    {
        $this->amound = $amound;

        return $this;
    }

    public function getPhone(): ?float
    {
        return $this->phone;
    }

    public function setPhone(float $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getNew(): ?bool
    {
        return $this->new;
    }

    public function setNew(bool $new): self
    {
        $this->new = $new;

        return $this;
    }

    public function getReceivedAt(): ?\DateTimeImmutable
    {
        return $this->receivedAt;
    }

    public function setReceivedAt(?\DateTimeImmutable $receivedAt): self
    {
        $this->receivedAt = $receivedAt;

        return $this;
    }

    public function getInProgress(): ?bool
    {
        return $this->inProgress;
    }

    public function setInProgress(bool $inProgress): self
    {
        $this->inProgress = $inProgress;

        return $this;
    }

    public function getInProgressAt(): ?\DateTimeImmutable
    {
        return $this->inProgressAt;
    }

    public function setInProgressAt(?\DateTimeImmutable $inProgressAt): self
    {
        $this->inProgressAt = $inProgressAt;

        return $this;
    }

    public function getShipped(): ?bool
    {
        return $this->shipped;
    }

    public function setShipped(bool $shipped): self
    {
        $this->shipped = $shipped;

        return $this;
    }

    public function getShippedAt(): ?\DateTimeImmutable
    {
        return $this->shippedAt;
    }

    public function setShippedAt(\DateTimeImmutable $shippedAt): self
    {
        $this->shippedAt = $shippedAt;

        return $this;
    }

    public function getComplete(): ?bool
    {
        return $this->complete;
    }

    public function setComplete(bool $complete): self
    {
        $this->complete = $complete;

        return $this;
    }

    public function getCompletedAt(): ?\DateTimeImmutable
    {
        return $this->completedAt;
    }

    public function setCompletedAt(\DateTimeImmutable $completedAt): self
    {
        $this->completedAt = $completedAt;

        return $this;
    }

    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
    }

    public function setTrackingNumber(?string $trackingNumber): self
    {
        $this->trackingNumber = $trackingNumber;

        return $this;
    }
}
