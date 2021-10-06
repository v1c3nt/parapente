<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PhotoRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PhotoRepository::class)
 */
class Photo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Groups("get:article")
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("get:article")
     */
    private $alt;

    /**
     * @ORM\ManyToMany(targetEntity=Article::class, mappedBy="photos")
     */
    private $articles;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="mainPicture")
     */
    private $mainArticles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->mainArticles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(string $alt): self
    {
        $this->alt = $alt;

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
            $article->addPhoto($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            $article->removePhoto($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->url;
    }

    /**
     * @return Collection|Article[]
     */
    public function getMainArticles(): Collection
    {
        return $this->mainArticles;
    }

    public function addMainArticle(Article $mainArticle): self
    {
        if (!$this->mainArticles->contains($mainArticle)) {
            $this->mainArticles[] = $mainArticle;
            $mainArticle->setMainPicture($this);
        }

        return $this;
    }

    public function removeMainArticle(Article $mainArticle): self
    {
        if ($this->mainArticles->removeElement($mainArticle)) {
            // set the owning side to null (unless already changed)
            if ($mainArticle->getMainPicture() === $this) {
                $mainArticle->setMainPicture(null);
            }
        }

        return $this;
    }
}
